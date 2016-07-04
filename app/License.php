<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $table = 'license';
    protected $fillable = array('gallery_item_id', 'license_code', 'domain','verify_code','expire_date');

    public function galleryItem()
    {
        return $this->belongsTo('App\Gallery','gallery_item_id');
    }
}
