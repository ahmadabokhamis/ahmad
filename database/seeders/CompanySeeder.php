<?php

namespace Database\Seeders;

use App\Models\CompanyAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class CompanySeeder extends Seeder

{
    public function run()
    {
        CompanyAdmin::create([
            'user_name' => 'company',
            'password' => Hash::make('12345678')
        ]);
    }
}
