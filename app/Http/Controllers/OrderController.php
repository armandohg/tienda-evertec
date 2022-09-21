<?php

namespace App\Http\Controllers;

use App\Actions\Order\UpdateOrderStatus;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index(): \Inertia\Response
    {
        // TODO: Restrict access to this view.
        $orders = Order::query()
            ->orderBy('id', 'desc')
            ->paginate(20);

        return inertia('Orders/Index', [
            'orders' => OrderResource::collection($orders)
        ]);
    }

    public function create(): \Inertia\Response
    {
        return inertia('Orders/Create');
    }

    public function store(StoreOrderRequest $request): \Illuminate\Http\RedirectResponse
    {
        $order = Order::create($request->validated());
        return Redirect::route('order.show', $order);
    }

    public function show(Order $order): \Inertia\Response
    {
        return inertia('Orders/Show', [
            'order' => new OrderResource($order),
        ]);
    }

    /**
     * Redirect to Place To Pay if needed
     * @param Order $order
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function payment(Order $order): \Symfony\Component\HttpFoundation\Response
    {
        if ($order->status === 'paid') {
            return Redirect::route('order.show', $order);
        }

        $order->verifyPaymentSession();
        return Inertia::location($order->payment_process_url);
    }


    /**
     * Coming back from Place To Pay
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processPayment(Order $order): \Illuminate\Http\RedirectResponse
    {
        UpdateOrderStatus::execute($order);
        return Redirect::route('order.show', $order);
    }
}
