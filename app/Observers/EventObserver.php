<?php

namespace App\Observers;

use App\Models\Event;
use Carbon\Carbon;

class EventObserver
{
    /**
     * Handle the Event "created" event.
     */
    public function created(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "updated" event.
     */
    public function updated(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     */
    public function deleted(Event $event): void
    {
        $time_start = Carbon::parse($event->time_start);
        $time_end = Carbon::parse($event->time_end);
        $hoursPerDay = $time_end->diffInHours($time_start);

        $date_start = Carbon::parse($event->date_start);
        $date_end = Carbon::parse($event->date_end);
        $days = $date_end->diffInDays($date_start)+1;


        $totalHours = $hoursPerDay * $days;

        $participants = $event->users;
        foreach ($participants as $participant) {
            $profile = $participant->profile;
            $profile->hours_spent +=$totalHours;
            $profile->good_deeds += 1;
            $profile->save();
        }
    }

    /**
     * Handle the Event "restored" event.
     */
    public function restored(Event $event): void
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     */
    public function forceDeleted(Event $event): void
    {
        //
    }
}
