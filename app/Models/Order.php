<?php

namespace App\Models;

use App\Actions\Order\CreatePaymentSession;
use App\Actions\Order\GenerateOrderNumber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'order_number',
        'payment_session_id',
        'payment_process_url',
        'comments',
    ];

    protected static function boot()
    {
        parent::boot();

        // This can bet set as an Observer.
        static::created(function (Order $order) {
            GenerateOrderNumber::execute($order);
        });
    }

    public function verifyPaymentSession(): void
    {
        if (!$this->payment_session_id || !$this->payment_process_url || $this->status === 'rejected') {
            CreatePaymentSession::execute($this);
        }
    }
}
