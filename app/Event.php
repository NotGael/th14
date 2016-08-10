<?php
//php artisan make:model Image -m
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y' . " - " . 'H:i');
    }

    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y' . " - " . 'H:i');
    }

    public function formStartAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y' . " - " . 'H:i');
    }

    public function formEndtAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y' . " - " . 'H:i');
    }

    public function setSlugAttribute($value)
    {
        if(empty($value))
        {
            $this->attributes['slug'] = str_slug($this->name);
        }
    }
}
