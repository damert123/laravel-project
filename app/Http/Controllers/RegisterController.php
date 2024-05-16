<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegRequest;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
   public function save(RegRequest $req){

        if(Auth::check()){
            return redirect()->to(route('user.private'));
        }

        $user = User::create([

            'name' => $req->input('name'),
            'second_name' => $req->input('second_name'),
            'groupp' => $req->input('groupp'),
            'date' => $req->input('date'),
            'phone' => $req->input('phone'),
            'pass' => $req->input('pass'),
            'email' => $req->input('email'),


        ]);

     


        if($user){

            $user->role = User::ROLE_READER;
            $user->save();
            Auth::login($user);
            return redirect()->to(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при создании пользователя'
        ]);
    
   }
}
