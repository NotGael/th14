<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'section_id',
        'content',
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
