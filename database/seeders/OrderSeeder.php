<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Order::create([
                'name' => $faker->word,
                'status' => $faker->randomElement(['pending', 'completed', 'canceled']),
                'order_date' => $faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            ]);
        }
    }
}

