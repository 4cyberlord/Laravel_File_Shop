<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeOnboardingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index()
    {
        return view('onboarding');
    }


    public function redirect(Request $request)
    {

        // Give us a link object back to grab a url back and redirect a user there.

        $response = app('stripe')->accountLinks->create([
            'account' => $request->user()->stripe_account_id,
            'type' => 'account_onboarding',
            'refresh_url' => route('onboarding.redirect'),
            'return_url' => route('onboarding.verify'),
        ]);

        return redirect($response->url);
    }

    public function verify()
    {
        dd('verify');
    }
}
