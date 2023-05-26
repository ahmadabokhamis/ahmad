<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Electronics',
            'Clothing',
            'Home',
            'Cars',
            'House',
            'Mobile',
            'Laptop',
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'description' => $category,
            ]);
        }
    }
}
