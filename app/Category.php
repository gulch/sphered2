<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';

    public function categoryItems()
    {
        return $this->hasMany('App\Item', 'id__Category');
    }
}
