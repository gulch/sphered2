<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'Feedback';
    protected $fillable = [
        'name',
        'email',
        'message',
        'ip'
    ];
    public $timestamps = false;
}
