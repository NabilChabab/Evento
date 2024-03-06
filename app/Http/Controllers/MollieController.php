<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    public function __construct() {
        Mollie::api()->setApiKey('test_xh8cwNDNr7rQrw3av6gWu5AktWTpQ5'); // your mollie test api key
    }

    public function preparePayment()
    {
        try {
            $payment = Mollie::api()->payments()->create([
                'amount' => [
                    'currency' => 'EUR', // Type of currency you want to send
                    'value' => '10.00', // You must send the correct number of decimals, thus we enforce the use of strings
                ],
                'description' => 'Payment By codehunger',
                'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
            ]);

            // redirect customer to Mollie checkout page
            return redirect($payment->getCheckoutUrl(), 303);
        } catch (\Exception $e) {
            // Log or handle the error
            return back()->with('error', 'Error preparing payment: ' . $e->getMessage());
        }
    }

    public function paymentSuccess(Request $request) {
        try {
            // Validate the request, process payment success logic if needed
            echo 'Payment has been received';
        } catch (\Exception $e) {
            // Log or handle the error
            return back()->with('error', 'Error processing payment success: ' . $e->getMessage());
        }
    }
}
