<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestCode extends Model
{
    protected $table = 'requestcode';
    protected $fillable = array('name','email','site','goal','workname','ip');
}
