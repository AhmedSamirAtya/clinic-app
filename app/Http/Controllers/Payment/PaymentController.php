<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Services\PaymobService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $paymob;

    public function __construct(PaymobService $paymob)
    {
        $this->paymob = $paymob;
    }

    public function initiatePayment(Request $request)
    {
        // Create order
        $order = $this->paymob->createOrder(11, 'EGP', [
            ['name' => 'Test Product', 'amount_cents' => $request->amount * 100]
        ]);
        // Get payment key
        $paymentKey = $this->paymob->getPaymentKey($order['id'], [
            'amount' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
            "merchant_order_id"=>5,
            'email' => 'john@example.com',
            'phone' => '01010101010'
        ]);
        return redirect()->away("https://accept.paymob.com/api/acceptance/iframes/" . env('PAYMOB_IFRAME_ID') . "?payment_token=$paymentKey");
    }

    public function callback(Request $request)
    {
        $hmac = $request->hmac;
        $data = $request->except('hmac');
        ksort($data);

        $queryString = http_build_query($data);
        $calculatedHmac = hash_hmac('sha512', $queryString, env('PAYMOB_HMAC_SECRET'));
        //if ($hmac === $calculatedHmac) {
            // Payment successful
            if ($data['success'] === "true") {
                // Handle successful payment
                return response()->json(['data' => $data]);
            }
        //}

        return response()->json(['success' => false], 400);
    }
}
