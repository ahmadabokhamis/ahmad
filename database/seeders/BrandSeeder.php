<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $brands = [
            [
                'name' => 'Nike',
                'description' => 'Sportswear and athletic gear',
                'image' => 'https://www.example.com/nike.png',
            ],
            [
                'name' => 'Adidas',
                'description' => 'Sportswear and athletic gear',
                'image' => 'https://www.example.com/adidas.png',
            ],
            [
                'name' => 'Levi\'s',
                'description' => 'Jeans and casual wear',
                'image' => 'https://www.example.com/levis.png',
            ],
            [
                'name' => 'GAP',
                'description' => 'Casual wear and basics',
                'image' => 'https://www.example.com/gap.png',
            ],
            [
                'name' => 'H&M',
                'description' => 'Affordable fashion',
                'image' => 'https://www.example.com/hm.png',
            ],
            [
                'name' => 'Zara',
                'description' => 'Fast fashion',
                'image' => 'https://www.example.com/zara.png',
            ],
            [
                'name' => 'Coach',
                'description' => 'Luxury handbags and accessories',
                'image' => 'https://www.example.com/coach.png',
            ],
            [
                'name' => 'Michael Kors',
                'description' => 'Luxury clothing and accessories',
                'image' => 'https://www.example.com/michaelkors.png',
            ],
            [
                'name' => 'Ray-Ban',
                'description' => 'Sunglasses',
                'image' => 'https://www.example.com/rayban.png',
            ],
            [
                'name' => 'Rolex',
                'description' => 'Luxury watches',
                'image' => 'https://www.example.com/rolex.png',
            ],
        ];

        foreach ($brands as $brandData) {
            $brand = new Brand();
            $brand->name = $brandData['name'];
            $brand->description = $brandData['description'];
            $brand->image = $brandData['image'];
            $brand->save();
        }
    }
}
