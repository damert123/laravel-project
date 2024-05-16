<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EditMembRequest;
use App\Models\User; // Подключаем модель пользователя
class MembEditController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = User::getRoles(); // Получаем значения ролей

        return view('members.edit-profile', compact('user', 'roles'));
    }

    public function update(EditMembRequest $request, $id)
    {
        $user = User::findOrFail($id);

        // Обновляем данные пользователя
        $user->update($request->validated());

        // Проверяем, загружен ли файл аватара
        if ($request->hasFile('avatar')) {
            // Получаем файл из запроса
            $avatar = $request->file('avatar');
            
            // Сохраняем файл
            $path = $avatar->store('avatars', 'public');
            
            // Обновляем путь к аватару пользователя в базе данных
            $user->update(['avatar' => $path]);
        }

        // Редирект на страницу профиля с сообщением об успешном обновлении
        return redirect()->route('admin.members.edit-profile', $user->id)->with('success', 'Профиль успешно обновлен.');
    }

}
