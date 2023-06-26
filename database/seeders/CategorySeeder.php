<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Clothing',
                'description' => 'All types of clothing',
                'children' => [
                    [
                        'name' => 'Tops',
                        'description' => 'Shirts, blouses, sweaters, etc.',
                        'children' => [
                            [
                                'name' => 'T-Shirts',
                                'description' => 'Casual shirts with short sleeves',
                            ],
                            [
                                'name' => 'Button-Up Shirts',
                                'description' => 'Shirts with buttons down the front',
                            ],
                            [
                                'name' => 'Sweaters',
                                'description' => 'Knitted or crocheted garments for the upper body',
                            ],
                            // Add more top subcategories here
                        ],
                    ],
                    [
                        'name' => 'Bottoms',
                        'description' => 'Pants, shorts, skirts, etc.',
                        'children' => [
                            [
                                'name' => 'Jeans',
                                'description' => 'Pants made of denim fabric',
                            ],
                            [
                                'name' => 'Dress Pants',
                                'description' => 'Formal pants for dressy occasions',
                            ],
                            [
                                'name' => 'Shorts',
                                'description' => 'Garments that cover the pelvic area and part of the legs',
                            ],
                            // Add more bottom subcategories here
                        ],
                    ],
                    [
                        'name' => 'Dresses',
                        'description' => 'One-piece garments for women',
                        'children' => [
                            [
                                'name' => 'Maxi Dresses',
                                'description' => 'Floor-length dresses',
                            ],
                            [
                                'name' => 'Midi Dresses',
                                'description' => 'Dresses that fall below the knee but above the ankle',
                            ],
                            [
                                'name' => 'Mini Dresses',
                                'description' => 'Short dresses that fall above the knee',
                            ],
                            // Add more dress subcategories here
                        ],
                    ],
                    [
                        'name' => 'Outerwear',
                        'description' => 'Jackets, coats, etc.',
                        'children' => [
                            [
                                'name' => 'Jackets',
                                'description' => 'Shorter outerwear garments that cover the upper body',
                            ],
                            [
                                'name' => 'Coats',
                                'description' => 'Longer outerwear garments that cover the whole body',
                            ],
                            [
                                'name' => 'Vests',
                                'description' => 'Sleeveless outerwear garments',
                            ],
                            // Add more outerwear subcategories here
                        ],
                    ],
                    [
                        'name' => 'Activewear',
                        'description' => 'Clothing designed for athletic or workout purposes',
                        'children' => [
                            [
                                'name' => 'Athletic Tops',
                                'description' => 'Shirts designed for athletic activities',
                            ],
                            [
                                'name' => 'Athletic Bottoms',
                                'description' => 'Pants or shorts designed for athletic activities',
                            ],
                            [
                                'name' => 'Sports Bras',
                                'description' => 'Bras designed for athletic activities',
                            ],
                            // Add more activewear subcategories here
                        ],
                    ],
                    [
                        'name' => 'Swimwear',
                        'description' => 'Clothing designed for swimming',
                        'children' => [
                            [
                                'name' => 'Swimsuits',
                                'description' => 'One-piece or two-piece garments designed for swimming',
                            ],
                            [
                                'name' => 'Swim Shorts',
                                'description' => 'Shorts designed for swimming',
                            ],
                            [
                                'name' => 'Cover-Ups',
                                'description' => 'Garments worn over swimsuits',
                            ],
                            // Add more swimwear subcategories here
                        ],
                    ],
                    [
                        'name' => 'Intimates',
                        'description' => 'Underwear, bras, etc.',
                        'children' => [
                            [
                                'name' => 'Underwear',
                                'description' => 'Garments worn under other clothing',
                            ],
                            [
                                'name' => 'Bras',
                                'description' => 'Garments designed to support the breasts',
                            ],
                            [
                                'name' => 'Lingerie',
                                'description' => 'Women\'s undergarments designed to be visually appealing',
                            ],
                            // Add more intimates subcategories here
                        ],
                    ],
                    [
                        'name' => 'Sleepwear',
                        'description' => 'Clothing designed for sleeping',
                        'children' => [
                            [
                                'name' => 'Pajamas',
                                'description' => 'Two-piece or one-piece garments designed for sleeping',
                            ],
                            [
                                'name' => 'Nightgowns',
                                'description' => 'Loose-fitting garments designed for sleeping',
                            ],
                            [
                                'name' => 'Robes',
                                'description' => 'Garments worn over sleepwear',
                            ],
                            // Add more sleepwear subcategories here
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Accessories',
                'description' => 'All types of accessories',
                'children' => [
                    [
                        'name' => 'Jewelry',
                        'description' => 'Necklaces, earrings, bracelets, etc.',
                    ],
                    [
                        'name' => 'Watches',
                        'description' => 'Timepieces worn on the wrist or elsewhere',
                    ],
                    [
                        'name' => 'Hats',
                        'description' => 'Head coverings',
                    ],
                    [
                        'name' => 'Scarves',
                        'description' => 'Fabric worn around the neck or head',
                    ],
                    [
                        'name' => 'Belts',
                        'description' => 'Garments worn around the waist',
                    ],
                    [
                        'name' => 'Gloves',
                        'description' => 'Hand coverings',
                    ],
                    [
                        'name' => 'Sunglasses',
                        'description' => 'Eyewear designed to protect the eyes from sunlight',
                    ],
                    [
                        'name' => 'Bags',
                        'description' => 'Handbags, backpacks, clutches, etc.',
                        'children' => [
                            [
                                'name' => 'Handbags',
                                'description' => 'Bags carried by hand',
                            ],
                            [
                                'name' => 'Backpacks',
                                'description' => 'Bags carried on the back',
                            ],
                            [
                                'name' => 'Clutches',
                                'description' => 'Small bags carried by hand',
                            ],
                            // Add more bag subcategories here
                        ],
                    ],
                    [
                        'name' => 'Shoes',
                        'description' => 'Sneakers, boots, sandals, etc.',
                        'children' => [
                            [
                                'name' => 'Sneakers',
                                'description' => 'Shoes designed for casual wear',
                            ],
                            [
                                'name' => 'Boots',
                                'description' => 'Shoes that cover the foot and ankle',
                            ],
                            [
                                'name' => 'Sandals',
                                'description' => 'Open-toe shoes that expose the foot',
                            ],
                            // Add more shoe subcategories here
                        ],
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = new Category();
            $category->name = $categoryData['name'];
            $category->description = $categoryData['description'];
            $category->save();

            if (isset($categoryData['children'])) {
                foreach ($categoryData['children'] as $childData) {
                    $childCategory = new Category();
                    $childCategory->name = $childData['name'];
                    $childCategory->description = $childData['description'];
                    $childCategory->parent_id = $category->id;
                    $childCategory->save();
                }
            }
        }
    }
}
