<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $guarded = [];
    protected $casts = ['is_active' => 'boolean', 'starts_at' => 'date', 'ends_at' => 'date'];

    public function scopeActive($q)
    {
        return $q->where('is_active', true)
            ->where(fn ($q) => $q->whereNull('starts_at')->orWhere('starts_at', '<=', today()))
            ->where(fn ($q) => $q->whereNull('ends_at')->orWhere('ends_at', '>=', today()))
            ->orderBy('sort_order');
    }
}
