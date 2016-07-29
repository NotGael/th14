<?php
//php artisan make:model Image -m
namespace App;

use Illuminate\Database\Eloquent\Model;

class Photography extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'online',
        'image_name',
        'image_path',
        'image_extension',
        'image_type',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
