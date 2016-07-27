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
        'grade',
        'firstname',
        'lastname',
        'totem',
        'email',
        'password',
        'tel',
        'image_name',
        'image_path',
        'image_extension',
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

    public function photographies()
    {
        return $this->hasMany('App\Photography', 'user_id');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder', 'user_id');
    }

}
