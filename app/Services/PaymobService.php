<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class PaymobService
{
    protected $client;
    protected $apiKey;
    protected $hmacSecret;
    protected $cardIntegrationId;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('PAYMOB_API_KEY');
        $this->hmacSecret = env('PAYMOB_HMAC_SECRET');
        $this->cardIntegrationId = env('PAYMOB_CARD_INTEGRATION_ID');
    }

    public function authenticate()
    {
        try {
            $response = $this->client->post('https://accept.paymob.com/api/auth/tokens', [
                'json' => ['api_key' => $this->apiKey]
            ]);

            return json_decode($response->getBody(), true)['token'];
        } catch (\Exception $e) {
            Log::error('Paymob Authentication Error: ' . $e->getMessage());
            return null;
        }
    }

    public function createOrder($amount, $currency = 'EGP', $items = [])
    {
        $authToken = $this->authenticate();

        try {
            $response = $this->client->post('https://accept.paymob.com/api/ecommerce/orders', [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => [
                    'auth_token' => $authToken,
                    'delivery_needed' => false,
                    'amount_cents' => $amount * 100,
                    'currency' => $currency,
                    'items' => $items
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error('Paymob Order Creation Error: ' . $e->getMessage());
            return null;
        }
    }

    public function getPaymentKey($orderId, $userData)
    {
        $authToken = $this->authenticate();

        try {
            $response = $this->client->post('https://accept.paymob.com/api/acceptance/payment_keys', [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => [
                    'auth_token' => $authToken,
                    'amount_cents' => $userData['amount'] * 100,
                    'mechant_order_id' => $orderId,
                    'expiration' => 3600,
                    'order_id' => $orderId,
                    'billing_data' => [
                        'first_name' => $userData['first_name'],
                        'last_name' => $userData['last_name'],
                        'email' => $userData['email'],
                        'phone_number' => $userData['phone'],
                        'country' => 'EG',
                        'building' => '4',
                        'apartment' => '123', // Required: Apartment number or building number
                        'floor' => '4',       // Required: Floor number
                        'street' => 'Main St', // Required: Street name
                        'city' => 'Cairo',    // Required: City name
                        'country' => 'Egypt', // Required: Country name
                        'postal_code' => '12345', // Optional: Postal code
                        'region' => 'Giza',   // Optional: Region or state
                        'phone_number' => '+20123456789',
                    ],
                    'currency' => 'EGP',
                    'integration_id' => $this->cardIntegrationId
                ]
            ]);
            return json_decode($response->getBody(), true)['token'];
        } catch (\Exception $e) {
            dd('get Payment key',$e);
            Log::error('Paymob Payment Key Error: ' . $e->getMessage());
            return null;
        }
    }
}
