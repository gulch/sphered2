<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'Tag';

    protected $fillable = [
        'slug',
        'title',
        'content',
        'id__Image',
        'is_published',
        'seo_title',
        'seo_description',
        'seo_keywords'
    ];

    /* -------------- Scopes -------------- */

    public function scopeOrderedABC($query)
    {
        return $query->orderBy('title');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    /* -------------- Relations -------------- */

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'Article_Tag', 'id__Tag', 'id__Article');
    }

    public function image()
    {
        return $this->belongsTo('App\Image', 'id__Image');
    }
    
}
