<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Requests\CreateEventRequest;

class EventController extends Controller
{
    public function show()
    {
        // Получаем все новости из базы данных

        $event = Event::latest()->get();

        // Передаем данные новостей в представление
        return view('event', compact('event'));
    }

    public function showSettings()
    {
        // Получаем все новости из базы данных

        $events = Event::latest()->get();

        $participants = [];



        foreach ($events as $event){
            $participants[$event->id] = $event->users()->get();
        }

        // Передаем данные новостей в представление
        return view('event.settings-event', compact('events', 'participants'));
    }



    public function open($id)
    {
        $event = Event::findOrFail($id);

        $participants = $event->users;

        return view('info-event', compact('event', 'participants'));
    }

    public function openEdit($id)
    {
        $event = Event::findOrFail($id);

        $participants = $event->users;


        return view('event.edit-event', compact('event', 'participants'));
    }

    public function update(CreateEventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->update($request->validated());

        // Проверяем, загружен ли файл аватара
        if($request->hasfile('picture')){
            $picture = $request->file('picture');

            $path = $picture->store('picture', 'public');

            $event->update(['picture' => $path]);
        }

        return redirect()->route('admin.event.edit-event', $id)->with('success', 'Мероприятие успешно обновлено');
    }

    public function deleteEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        // После удаления мероприятия перенаправляем пользователя обратно на страницу настроек мероприятий
        return redirect()->route('admin.event.settings-event')->with('success', 'Мероприятие успешно удалено');
    }






}
