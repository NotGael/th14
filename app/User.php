<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_id',
        'section_id',
        'photography_id',
        'grade',
        'firstname',
        'lastname',
        'totem',
        'email',
        'password',
        'tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function photography()
    {
        return $this->belongsTo('App\Photography');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

}
