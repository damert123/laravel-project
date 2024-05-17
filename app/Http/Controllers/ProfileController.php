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

        $getEvent = $user->events()->get();


        // Передаем данные пользователя в представление
        return view('private', compact('user', 'getEvent'));
    }

    public function edit()
    {
    // Получаем текущего аутентифицированного пользователя
    $user = Auth::user();

    // Передаем данные пользователя в представление для редактирования
    return view('edit', compact('user'));
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

    // Редирект на страницу профиля с сообщением об успешном обновлении
    return redirect()->route('user.private')->with('success', 'Профиль успешно обновлен.');
}
}
