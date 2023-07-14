<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfUserHasNotEnabledStripe;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', RedirectIfUserHasNotEnabledStripe::class]);
    }


    public function __invoke()
    {
        return view('dashboard');
    }
}
