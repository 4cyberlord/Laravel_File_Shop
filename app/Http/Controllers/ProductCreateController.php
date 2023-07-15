<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfUserHasNotEnabledStripe;

class ProductCreateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', RedirectIfUserHasNotEnabledStripe::class]);
    }


    public function __invoke()
    {
        return view('products.create');
    }
}
