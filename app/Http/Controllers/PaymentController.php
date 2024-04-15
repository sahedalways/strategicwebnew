<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentWithStripe(Request $request)
    {
        if (!auth()->check()) {
            session()->flash('message', 'You have to login first.');

            // Redirect to the login page
            return redirect()->route('login');
        }

        $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
        $date = date('Y-m-d H:i:s');

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => ['name' => $request->service_name],
                        'unit_amount' => $request->total_price * 100
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel'),
        ]);


        if (isset($response->id) && $response->id != '') {
            session()->put('service_name', $request->service_name);
            session()->put('date', $date);
            session()->put('quantity', 1);
            session()->put('price', $request->total_price);
            session()->put('tax', $request->tax);
            return redirect($response->url);
        } else {
            return redirect()->route('cancel');
        }
    }


    public function success(Request $request)
    {
        if (isset($request->session_id)) {

            $stripe = new \Stripe\StripeClient(config('stripe.stripe_sk'));
            $response = $stripe->checkout->sessions->retrieve($request->session_id);
            //dd($response);

            $payment = new Payment();
            $payment->payment_id = $response->id;
            $payment->user_id = auth()->user()->id;
            $payment->service_name = session()->get('service_name');
            $payment->quantity = session()->get('quantity');
            $payment->amount = session()->get('price');
            $payment->currency = $response->currency;
            $payment->customer_name = $response->customer_details->name;
            $payment->customer_email = $response->customer_details->email;
            $payment->payment_status = $response->status;
            $payment->payment_method = "Stripe";
            $payment->save();


            session()->forget(['date', 'price', 'tax', 'price', 'quantity', 'service_name']);


            return view('frontend.checkout.success', ['purchaseId' => $payment->payment_id]);
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        return view('frontend.checkout.cancel');
    }
}
