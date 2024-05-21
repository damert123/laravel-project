<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\UpdateprofileRequest;


class ProfileController extends Controller
{
    public function show()
    {
        // Получаем текущего аутентифицированного пользователя
        $user = Auth::user();
        $profile = $user->profile;

        $getEvent = $user->events()->get();


        // Передаем данные пользователя в представление
        return view('private', compact('user', 'getEvent', 'profile'));
    }

    public function edit()
    {
    // Получаем текущего аутентифицированного пользователя
    $user = Auth::user();
    $profile = $user->profile;

    // Передаем данные пользователя в представление для редактирования
    return view('edit', compact('user', 'profile'));
    }



    public function update(UpdateprofileRequest $req)
{
    // Валидация данных, например, можно использовать $request->validate()

    // Получаем текущего аутентифицированного пользователя
    $user = Auth::user();

    // Обновляем данные пользователя
    $user->update([
        'name' => $req->input('name'),
        'second_name' => $req->input('second_name'),
        'groupp' => $req->input('groupp'),
        'date' => $req->input('date'),
        'phone' => $req->input('phone'),
        'email' => $req->input('email'),
        'about' => $req->input('about')
        // Другие поля профиля...
    ]);

      // Проверяем, загружен ли файл
      if ($req->hasFile('avatar')) {
        // Получаем файл из запроса
        $avatar = $req->file('avatar');

        // Сохраняем файл
        $path = $avatar->store('avatars', 'public');

        // Обновляем путь к аватару пользователя в базе данных
        $user->update(['avatar' => $path]);
    }

        $profile = $user->profile;
        $social_vk = $req->input('social_vk');
        $social_tg = $req->input('social_tg');

    function validateVkUrl($url) {
        return preg_match('/^https:\/\/vk\.com\/[A-Za-z0-9_.-]+$/', $url);
    }

    function validateTgUrl($url) {
        return preg_match('/^https:\/\/t\.me\/[A-Za-z0-9_.-]+$/', $url);
    }

    $errors= [];



    if (empty($social_vk)) {
        $profile->social_vk = null; // Устанавливаем пустое значение для поля
    } elseif (validateVkUrl($social_vk)) {
        $profile->social_vk = $social_vk; // Обновляем значение, если оно не пустое и проходит проверку
    } else {
        $errors['social_vk'] = 'Ссылка должна быть vk.com';
    }

// Проверка и обновление поля social_tg
        if (empty($social_tg)) {
            $profile->social_tg = null; // Устанавливаем пустое значение для поля
        } elseif (validateTgUrl($social_tg)) {
            $profile->social_tg = $social_tg; // Обновляем значение, если оно не пустое и проходит проверку
        } else {
            $errors['social_tg'] = 'Ссылка должна быть tg.me';
        }

// Если есть ошибки, возвращаемся назад с ошибками
        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }



        $profile->save();




    // Редирект на страницу профиля с сообщением об успешном обновлении
    return redirect()->route('user.private')->with('success', 'Профиль успешно обновлен.');
}
}
