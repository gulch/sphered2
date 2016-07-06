<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'message';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'ip'
    ];
}
