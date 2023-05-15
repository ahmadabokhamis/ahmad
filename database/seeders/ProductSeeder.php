<?php

namespace Database\Seeders;

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

        $faker = Faker::create();

        for ($i = 0; $i < 2000; $i++) {
            DB::table('products')->insert([
                'name' => $faker->name,
                'description' => $faker->name,
                'price' => $faker->numberBetween(10,100000),
                'quantity' => $faker->numberBetween(10,50),
                'table' => "User",
                'table_id' => 1,
            ]);
        }

    }
}
