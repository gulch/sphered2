<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table = 'gallery_category';

    public function galleryItems()
    {
        return $this->hasMany('App\Gallery', 'category_id');
    }

    public function itemCategoryRUS()
    {
        return $this->belongsTo('App\GalleryCategoryRUS','id');
    }
}
