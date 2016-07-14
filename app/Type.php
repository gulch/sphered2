<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';

    public function galleryItems()
    {
        return $this->hasMany('App\Gallery', 'id__Type');
    }
}
