<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Http\Requests\CreateEventRequest;
use App\Models\User;

class EventController extends Controller
{
    public function show()
    {
        // Получаем все новости из базы данных

        $eventQuery = Event::query();

        $event = $eventQuery->paginate(3);

        $user = auth()->user();


        // Передаем данные новостей в представление
        return view('event', compact('event', 'user'));
    }

    public function showSettings()
    {
        // Получаем все новости из базы данных



        $eventQuery = Event::query()->latest();

        $events = $eventQuery->paginate(5);



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

        $event->formatted_date_start = Carbon::parse($event->date_start)->translatedFormat('d F');
        $event->formatted_date_end = Carbon::parse($event->date_end)->translatedFormat('d F');
        $event->formatted_time_start = Carbon::parse($event->time_start)->format('H:i');
        $event->formatted_time_end = Carbon::parse($event->time_end)->format('H:i');



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
        $event->forceDelete();

        // После удаления мероприятия перенаправляем пользователя обратно на страницу настроек мероприятий
        return redirect()->route('admin.event.settings-event')->with('success', 'Мероприятие успешно удалено');
    }

    public function softDeleteEvent(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.settings-event')->with('success', 'Мероприятеи успешно завершилось');

    }






}
