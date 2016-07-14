<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    public $timestamps = false;
    protected $table = 'License';
    protected $fillable = [
        'item_id',
        'license_code',
        'domain',
        'verify_code',
        'expire_date'
    ];

    public function item()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
}
