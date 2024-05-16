<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Подключаем модель пользователя

class VolonterController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }
}
