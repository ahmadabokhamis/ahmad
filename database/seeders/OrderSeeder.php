<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Product_Order;
use App\Models\User;
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
        $users = User::where('id','>',9)->get();
        $products = Product::all();
        for ($j=0; $j < count($users) ; $j++) {
            for ($i = 0; $i < 50; $i++) {
                $order = Order::create([
                    'status' => "done",
                    'total' => 5000,
                    'payment_id' => 1,
                    'user_id' => $users[$j]->id,
                ]);

                for ($o=0; $o <  $faker->numberBetween(1,7); $o++) {
                    Product_Order::create([
                        'product_id' =>  $products->random()->id,
                        'order_id' =>  $order->id,
                        'price' => 500,
                        'quantity' => 1,
                        'rate' => $faker->numberBetween(1,5),
                    ]);
                }
            }
        }

    }
}
