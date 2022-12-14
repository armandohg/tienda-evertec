<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_name' => $this->faker->name(),
            'customer_email' => $this->faker->email(),
            'customer_mobile' => $this->faker->phoneNumber(),
            'comments' => $this->faker->realText(),
        ];
    }
}
