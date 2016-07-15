<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $table = 'Subscriber';
    protected $fillable = [
        'email',
        'ip'
    ];
}
