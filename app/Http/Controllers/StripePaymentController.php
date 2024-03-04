<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth::user();

        // Retrieve customer ID from the appropriate source (e.g., user model)
        $customerId = $user->stripe_customer_id;

        // Validate or debug the retrieved customer ID (optional)

        // Check if customer exists (optional)
        try {
            $customer = Stripe\Customer::retrieve($customerId);
        } catch (Exception $e) {
            // Handle error if customer retrieval fails (e.g., invalid ID)
            return redirect('home')->with('error', 'Payment failed. Please contact customer support.');
        }

        // Charge the customer
        try {
            Stripe\Charge::create([
                // ... other charge details
                'customer' => $customer->id,
            ]);
        } catch (Exception $e) {
            // Handle charge creation error (e.g., insufficient funds, declined card)
            return redirect('home')->with('error', 'Payment failed. Please check your payment information.');
        }

        return redirect('home')->with('status', 'success');
    }
}
