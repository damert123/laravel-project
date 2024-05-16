<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, авторизован ли пользователь
        if (!$request->user()) {
            return redirect()->route('main');
        }

        // Проверяем, является ли пользователь администратором
        if ($request->user()->role != \App\Models\User::ROLE_ADMIN) {
            return redirect()->route('main');
        }

        return $next($request);
    }
}
