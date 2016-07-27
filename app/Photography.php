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
        'section_id',
        'is_active',
        'is_featured',
        'image_name',
        'image_path',
        'image_extension',
        'mobile_image_name',
        'mobile_image_path',
        'mobile_extension',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function section()
    {
        return $this->belongsTo('App\Section');
    }


}
