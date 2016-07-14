<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';

    public function galleryItems()
    {
        return $this->hasMany('App\Gallery', 'id__Category');
    }
}
