<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // protected $priority = 1;
    public function run()
    {

        $users = User::all();
        $categories = Category::all();
        $faker = Faker::create();


        // Generate fake products
        foreach ($users as $user) {
            $productsCount = rand(5, 10);

            for ($i = 0; $i < $productsCount; $i++) {
                $product = $user->products()->create([
                    'name' => 'Product ' . ($i + 1),
                    'name' => $faker->name,
                    'description' => $faker->name,
                    'price' => $faker->numberBetween(10,100000),
                    'quantity' => $faker->numberBetween(10,50),
                    'table' => "User",
                    'table_id' => $user->id,
                ]);
                $product->categories()->attach(
                    $categories->random(rand(1, 2))->pluck('id')->toArray()
                );
            }
        }




    }
}
