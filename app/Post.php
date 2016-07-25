<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'user_id',
        'section_id',
        'title',
        'slug',
        'content',
        'online',
    ];

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    public function scopePublished($query) {
        return $query->where('online', true)->whereRaw('created_at < NOW()');
    }

    public function scopeSearchByTitle($query, $q)
    {
        return $query->where('title', 'LIKE', '%' . $q . '%');
    }

    // Rajoute une majuscule à tt les titres récupéré
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'published_at'];
    }

    public function setSlugAttribute($value)
    {
        if(empty($value))
        {
            $this->attributes['slug'] = str_slug($this->title);
        }
    }
}
