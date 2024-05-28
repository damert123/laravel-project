<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
//     public function getDateStartAttribute($value)
// {
//     return \Carbon\Carbon::parse($value)->format('d.m.Y');
// }

    protected $table = 'event';
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'header', 'picture', 'descrip', 'date_start', 'date_end',
        'time_start', 'time_end', 'organizer', 'location', 'require'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }


}
