<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class StripeController extends Controller
{
    public function checkout() {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
        $checkout_session = $stripe->checkout->sessions->create(
            [
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => [
                            'name' => 'test'
                        ],
                        'unit_amount' => 10000,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('cancel')
            ]);
        return redirect($checkout_session->url);
    }

    public function success() {
        return view('stripe.success');
    }

    public function cancel() {
        return view('stripe.cancel');
    }
}
