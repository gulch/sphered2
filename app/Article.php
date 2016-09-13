<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'Article';

    /* -------------- Scopes -------------- */

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    /* ------------- Relations ------------ */

    public function image()
    {
        return $this->belongsTo('App\Image','id__Image');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'Article_Tag', 'id__Article', 'id__Tag');
    }

}
