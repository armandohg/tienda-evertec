<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_list = ['created', 'paid', 'rejected'];
        Order::factory()
            ->count(100)
            ->state(new Sequence(
                fn ($sequence) => ['status' => $status_list[array_rand($status_list)]],
            ))
            ->create();
    }
}
