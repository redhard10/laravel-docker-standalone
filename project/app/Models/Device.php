<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'brand_name',
        'model'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}