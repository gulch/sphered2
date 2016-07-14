<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'Item';
    public $timestamps = false;

    /* -------------- Scopes -------------- */



    /* ------------- Relations ------------ */

    public function itemType()
    {
        return $this->belongsTo('App\Type','id__Type');
    }

    public function itemCategory()
    {
        return $this->belongsTo('App\Category','id__Category');
    }

    /* --------- Служебные функции --------- */

    public function slugOfType()
    {
        return $this->itemType->url_segment;
    }

    public function slugOfCategory()
    {
        return $this->itemCategory->url_segment;
    }

    public function getUrlPath()
    {
        $path = '/';
        $path .= $this->is_commercial ? 'portfolio' : 'gallery';
        $path .= '/' . $this->slugOfType() . '/' . $this->slugOfCategory();
        $path .= '/' . $this->url_segment;

        return $path;
    }
}
