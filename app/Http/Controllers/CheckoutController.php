<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51IAt9vHss8xSyQhA9dhBA6eoQ5go1bfAIbk95U5JyFL6G9fAEHVmLW7plo5igDzu1BKaZdnK7ug6ciDQf7ltr8YR00lNENaZjB');
        		
		$amount = 10;
		$amount *= 10;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From Codehunger',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        echo 'Payment Has been Received';
    }
}
