<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';

    public function items()
    {
        return $this->hasMany('App\Item', 'id__Type');
    }
}
