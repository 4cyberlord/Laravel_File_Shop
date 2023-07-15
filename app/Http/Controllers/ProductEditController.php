<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfUserHasNotEnabledStripe;
use App\Models\Products;

class ProductEditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', RedirectIfUserHasNotEnabledStripe::class]);
    }

    public function __invoke(Products $product)
    {
        // Passing product down to our livewire view component
        return view('products.edit', ['product' => $product]);
    }
}
