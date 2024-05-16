<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Подключаем модель пользователя


class MembersController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей из базы данных
        $user = User::all();
        
        // Передаем данные пользователей в представление
        return view('members', compact('user'));
    }
}
