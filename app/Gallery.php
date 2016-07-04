<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery_item';

    public function itemType()
    {
        return $this->belongsTo('App\GalleryType','type_id');
    }

    public function itemTypeRUS()
    {
        return $this->belongsTo('App\GalleryTypeRUS','type_id');
    }

    public function itemRUS()
    {
        return $this->belongsTo('App\GalleryRUS','id');
    }

    public function itemCategory()
    {
        return $this->belongsTo('App\GalleryCategory','category_id');
    }

    public function itemCategoryRUS()
    {
        return $this->belongsTo('App\GalleryCategoryRUS','category_id');
    }
}
