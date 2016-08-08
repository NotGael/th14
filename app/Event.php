<?php
//php artisan make:model Image -m
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'section_id',
        'name',
        'slug',
        'content',
        'start',
        'end',
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }
}
