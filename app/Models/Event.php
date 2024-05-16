<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
//     public function getDateStartAttribute($value)
// {
//     return \Carbon\Carbon::parse($value)->format('d.m.Y');
// }

    protected $table = 'event';
    use HasFactory;
    protected $fillable = [
        'header', 'picture', 'descrip', 'date_start', 'date_end', 'organizer', 'location', 'require'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }
}
