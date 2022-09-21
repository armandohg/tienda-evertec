<?php

namespace App\Services;

use App\Models\Order;
use Dnetix\Redirection\PlacetoPay;

class PlaceToPayService
{
    private static PlacetoPay $placeToPay;

    private static function setup()
    {
        self::$placeToPay = new PlacetoPay([
            'login' => config('services.place_to_pay.login'),
            'tranKey' => config('services.place_to_pay.tranKey'),
            'baseUrl' => config('services.place_to_pay.baseUrl'),
        ]);
    }

    public static function createSession(Order $order): \Dnetix\Redirection\Message\RedirectResponse
    {
        self::setup();
        $request = [
            'payment' => [
                'reference' => $order->order_number,
                'description' => 'Testing payment',
                'amount' => [
                    'currency' => 'USD',
                    'total' => 200,
                ],
            ],
            'expiration' => now()->addDays(2),
            'returnUrl' => route('order.process_payment', $order),
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];
        $response = self::$placeToPay->request($request);

        return $response;
    }

    public static function paymentSessionInfo(Order $order): ?\Dnetix\Redirection\Message\RedirectInformation
    {
        if (!$order->payment_session_id) {
            return null;
        }

        self::setup();
        return self::$placeToPay->query($order->payment_session_id);
    }
}
