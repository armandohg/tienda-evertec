<?php

namespace App\Actions\Order;

use App\Models\Order;

class GenerateOrderNumber
{
    public static function execute(Order $order)
    {
        $order->update(['order_number' => "EV-{$order->id}"]);
    }
}
