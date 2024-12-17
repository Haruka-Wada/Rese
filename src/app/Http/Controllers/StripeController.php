<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout;


class StripeController extends Controller
{
    public function checkout(Request $request) {
        $user = User::find(Auth::id());
        return $user->checkout(['price_1QWrJDFZPeEzOxnhK5YZTlcS'=>1], [
            'success_url' => route('success'),
            'cancel_url' => route('cancel')
        ]);
    }

    public function success() {
        return view('stripe.success');
    }

    public function cancel() {
        return view('stripe.cancel');
    }
}
