<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product_Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  protected $priority = 2;


    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            $order = Order::create([
                'statuse' => "done",
                'total' => 5000,
                'payment_id' => 1,
                'user_id' => 1,
            ]);

            for ($j=0; $j <  $faker->numberBetween(1,5); $j++) {
                Product_Order::create([
                    'product_id' => $faker->numberBetween(1,500),
                    'order_id' =>  $order->id,
                    'price' => 500,
                    'quantity' => 1,
                    'rate' => null,
                ]);
            }
        }
    }
}
