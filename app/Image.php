<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'Image';
    protected $fillable = ['type', 'path', 'alt'];
}
