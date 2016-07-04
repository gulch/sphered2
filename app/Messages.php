<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'message';
    protected $fillable = array('name','email','phone','message','ip');
}
