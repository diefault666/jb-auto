<?php

use App\Models\Faq;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'products' => Product::query()
            ->where('is_active', true)
            ->with(['colors', 'specs'])
            ->orderBy('sort_order')
            ->get(),
        'faqs' => Faq::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get(),
    ]);
});
