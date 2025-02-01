<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'level',
        'address'
    ];

    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}


