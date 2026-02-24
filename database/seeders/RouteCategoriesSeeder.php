<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('route_categories')->insert([
            [
                'name' => 'Barat',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
            [
                'name' => 'Timur',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
        ]);
    }
}
