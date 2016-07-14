<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery_item';

    public function itemType()
    {
        return $this->belongsTo('App\Type','id__Type');
    }

    public function itemRUS()
    {
        return $this->belongsTo('App\GalleryRUS','id');
    }

    public function itemCategory()
    {
        return $this->belongsTo('App\Category','id__Category');
    }
}
