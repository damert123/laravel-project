<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;

class EventUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $eventId)
    {
        // Проверяем аутентификацию пользователя
        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'Войдите или зарегистрируйтесь, чтобы записаться на мероприятие');
        }
        
        
        // Получаем мероприятие
        $event = Event::findOrFail($eventId);
        
        // Получаем текущего пользователя
        $user = auth()->user();

        // Проверяем, записан ли пользователь уже на мероприятие
        if ($event->users()->where('users.id', $user->id)->exists()) {
            return redirect()->route('info-event', $eventId)->with('success', 'Вы уже записаны на это мероприятие');
        }
        
        $event->users()->attach($user);
        
        return redirect()->route('info-event', $eventId)->with('success', 'Вы успешно записались на мероприятие');
    }

    public function cancel(Request $request, $eventId)
{
    // Получаем мероприятие
    $event = Event::findOrFail($eventId);
    
    // Получаем текущего пользователя
    $user = auth()->user();

    // Проверяем, записан ли пользователь на мероприятие
    if (!$event->users()->where('users.id', $user->id)->exists()) {
        return redirect()->back()->with('error', 'Вы не были записаны на это мероприятие');
    }

    // Удаляем пользователя из списка участников мероприятия
    $event->users()->detach($user);

    return redirect()->back()->with('success', 'Вы успешно отменили запись на мероприятие');
}

}
