<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect();
        for ($i = 0; $i < 1000; $i++) {
            $users->push([
                'name' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }
        $users->chunk(1000)->each(function ($chunk) {
            User::insert($chunk->toArray());
        });
    }
}
