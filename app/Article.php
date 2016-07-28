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

    /* ------------- Relations ------------ */

    public function image()
    {
        return $this->belongsTo('App\Image','id__Image');
    }

}
