<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfUserHasNotEnabledStripe;
use Illuminate\Http\Request;

class ProductIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', RedirectIfUserHasNotEnabledStripe::class]);
    }


    public function __invoke()
    {
        return view('products.index');
    }
}
