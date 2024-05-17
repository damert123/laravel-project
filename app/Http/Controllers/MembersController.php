<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Подключаем модель пользователя


class MembersController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей из базы данных
        $usersQuery = User::query();

        $users = $usersQuery->paginate(5);

        // Передаем данные пользователей в представление
        return view('members', compact('users'));
    }
}
