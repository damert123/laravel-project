<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $event = Event::find(11);
        $date_start = Carbon::parse($event->date_start);
        $date_end = Carbon::parse($event->date_end);
        $days = $date_end->diffInDays($date_start)+1;

        $time_start = Carbon::parse($event->time_start);
        $time_end = Carbon::parse($event->time_end);
        $hoursPerDay = $time_end->diffInHours($time_start);

        $totalhours = $hoursPerDay * $days;

        dd($days, $totalhours);

    }
}
