<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function colors()
    {
        return $this->hasMany(ProductColor::class)->orderBy('sort_order');
    }
    public function specs()
    {
        return $this->hasMany(ProductSpec::class)->orderBy('sort_order');
    }
}
