<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('routes')->insert([
            [
                'route_category_id' => '1',
                'name' => 'Balaraja - Kota Cilegon',
                'fee' => '400000',
            ],
            [
                'route_category_id' => '1',
                'name' => 'Balaraja - Pasuruan',
                'fee' => '500000',
            ],
            [
                'route_category_id' => '1',
                'name' => 'Bandung - Kota Cilegon',
                'fee' => '600000',
            ],
            [
                'route_category_id' => '2',
                'name' => 'Pasuruan - Balaraja',
                'fee' => '700000',
            ],
            [
                'route_category_id' => '2',
                'name' => 'Surabaya - Batang',
                'fee' => '800000',
            ],
            [
                'route_category_id' => '2',
                'name' => 'Surabaya - Bogor',
                'fee' => '900000',
            ],
        ]);
    }
}
