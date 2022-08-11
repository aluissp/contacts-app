<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        return auth()->user()
            ->newSubscription('default', config('stripe.price_id'))
            ->checkout();
    }
    public function billingPortal()
    {
        return $request->user()->redirectToBillingPortal();
    }

    public function freeTrialEnd()
    {
        return view('free-trial-end');
    }
}
