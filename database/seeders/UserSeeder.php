<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'simud@admin.dev',
                'password' => bcrypt('123123123'),
                'is_active' => '1',
            ],
            [
                'name' => 'Driver User 1',
                'email' => 'driver1@gmail.com',
                'password' => bcrypt('123123123'),
                'is_active' => '1',
            ],
            [
                'name' => 'Driver User 2',
                'email' => 'driver2@gmail.com',
                'password' => bcrypt('123123123'),
                'is_active' => '1',
            ],
            [
                'name' => 'Driver User 3',
                'email' => 'driver3@gmail.com',
                'password' => bcrypt('123123123'),
                'is_active' => '1',
            ],
        ]);
    }
}
