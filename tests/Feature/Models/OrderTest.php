<?php

use App\Models\Order;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);
test('a customer can place an order', function () {
    $order_data = [
        'customer_name' => 'John Doe',
        'customer_email' => 'john@doe.com',
        'customer_mobile' => '1234567890'
    ];
    $response = $this->post(route('order.store'), $order_data);
    $response->assertStatus(302);

    \Pest\Laravel\assertDatabaseHas('orders', $order_data);
});

test('a paid order cannot be paid again', function () {
    $order = Order::factory()->create(['status' => 'paid']);
    $response = $this->get(route('order.payment', $order));
    $response->assertStatus(302);
    $response->assertLocation(route('order.show', $order));
});
