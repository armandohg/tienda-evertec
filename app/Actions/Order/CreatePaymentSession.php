<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Services\PlaceToPayService;

class CreatePaymentSession
{
    public static function execute(Order $order)
    {
        $session = PlaceToPayService::createSession($order);
        $order->status = 'created';
        $order->payment_session_id = (int)$session->requestId();
        $order->payment_process_url = $session->processUrl();
        $order->save();
    }
}
