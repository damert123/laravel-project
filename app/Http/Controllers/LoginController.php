<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function login(Request $request){


    if(Auth::check()){
        return redirect()->intended(route('use.private'));
    }
    

    $formFields = $request->only(['email', 'pass']);                                                                                                                            
   

    $user = User::where('email', $formFields['email'])->first();

    if ($user) {
        // Проверяем, соответствует ли введенный пароль хешу пароля пользователя
        if (Hash::check($formFields['pass'], $user->pass)) {
            // Если пароли совпадают, выполняем вход пользователя
            Auth::login($user);
            return redirect()->intended(route('user.private'));
        }
        
    }
    return redirect(route('user.login'))->withErrors([
        'email' => 'Не удалось авторизоваться'
    ]);
   
}

        public function logout(Request $request)
        {
            // Очищаем данные сессии
            $request->session()->invalidate();
            
            // Регенерируем CSRF-токен
            $request->session()->regenerateToken();
            
            // Очищаем все данные сессии
            $request->session()->flush();

            // Выходим из системы
            Auth::logout();
            
            // Перенаправляем на главную страницу или куда-то еще
            return redirect('/');
        }


}
