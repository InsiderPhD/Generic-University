<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function uniClasses()
    {
        return $this->hasMany('App\UniClass');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }


    public function teachingClasses()
    {
        return $this->hasMany('App\UniClass', 'user_id', 'id');
    }
}
