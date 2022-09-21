<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Services\PlaceToPayService;

class UpdateOrderStatus
{

    public static function execute(Order $order)
    {
        $payment_status = PlaceToPayService::paymentSessionInfo($order)->status();
        $order_status = match (true) {
            $payment_status->isApproved() => 'paid',
            $payment_status->isRejected() => 'rejected',
            default => 'created',
        };

        $order->update(['status' => $order_status]);
    }
}
