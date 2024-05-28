<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\User; // Подключаем модель пользователя


class MembersController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей из базы данных


        $users = User::with('profile')->paginate(5);

        // Передаем данные пользователей в представление
        return view('members', compact('users'));
    }
}
