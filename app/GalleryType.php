<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryType extends Model
{
    protected $table = 'gallery_item_type';

    public function galleryItems()
    {
        return $this->hasMany('App\Gallery', 'type_id');
    }

    public function itemTypeRUS()
    {
        return $this->belongsTo('App\GalleryTypeRUS','id');
    }
}
