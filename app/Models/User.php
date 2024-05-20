<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_READER = 2;

    public static function getRoles (){

        return[
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Волонтёр',
        ];
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'second_name',
        'groupp',
        'date',
        'phone',
        'pass',
        'email',
        'about',
        'avatar',
        'role'
    ];

    public function setPassAttribute($pass){
        $this->attributes['pass'] = Hash::make($pass);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


}
