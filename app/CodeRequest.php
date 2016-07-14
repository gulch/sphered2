<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeRequest extends Model
{
    protected $table = 'CodeRequest';
    protected $fillable = [
        'name',
        'email',
        'site',
        'goal',
        'workname',
        'ip'
    ];
}
