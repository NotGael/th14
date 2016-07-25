<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'user_id',
        'photography_id',
        'name',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photography()
    {
        return $this->belongsTo('App\Photography');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'section_id');
    }

    public function reminders()
    {
        return $this->hasMany('App\Reminder', 'section_id');
    }

    public function photographies()
    {
        return $this->hasMany('App\Photography', 'section_id');
    }

}
