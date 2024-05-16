<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateEventRequest;
use App\Models\Event;

class CreateEventController extends Controller
{
    public function store(CreateEventRequest $request)
    {

        if ($request->hasFile('picture')) {
            // Получаем файл из запроса
            $picture = $request->file('picture');
            
            // Сохраняем файл
            $path = $picture->store('picture', 'public');
            
          
        }
        // Проводим валидацию данных с помощью EventRequest

        // Создаем новый экземпляр модели Event и заполняем данными из запроса
        $event = new Event();
        $event->header = $request->input('header');
        $event->descrip = $request->input('descrip');
        $event->picture = $path ?? $event->picture = null;
        $event->date_start = $request->input('date_start');
        $event->date_end = $request->input('date_end');
        $event->organizer = $request->input('organizer');
        $event->location = $request->input('location');
        $event->require = $request->input('require');

        // Сохраняем мероприятие в базу данных
        $event->save();

        // После сохранения можем выполнить какие-либо дополнительные действия,
        // например, перенаправить пользователя на страницу с информацией о новом мероприятии
        return redirect()->route('event')->with('success', 'Мероприятие успешно добавлено');
    }
}
