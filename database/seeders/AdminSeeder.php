<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder

{
    public function run()
    {
        Admin::create([
            'user_name' => 'admin',
            'password' => Hash::make('12345678')
        ]);
    }
}
