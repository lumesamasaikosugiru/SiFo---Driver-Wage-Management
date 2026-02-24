<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RitaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ritases')->insert([
            [
                'driver_id' => '2',
                'route_id' => '1',
                'job_order_id' => '1',
                'date' => '2026-02-24',
                'tarif' => '60000',
                'status' => 'draft',
            ],
            [
                'driver_id' => '2',
                'route_id' => '1',
                'job_order_id' => '2',
                'date' => '2026-02-25',
                'tarif' => '60000',
                'status' => 'draft',
            ],
            [
                'driver_id' => '2',
                'route_id' => '1',
                'job_order_id' => '3',
                'date' => '2026-02-26',
                'tarif' => '60000',
                'status' => 'draft',
            ],
            [
                'driver_id' => '2',
                'route_id' => '1',
                'job_order_id' => '4',
                'date' => '2026-02-27',
                'tarif' => '60000',
                'status' => 'draft',
            ],
            [
                'driver_id' => '2',
                'route_id' => '1',
                'job_order_id' => '5',
                'date' => '2026-02-28',
                'tarif' => '60000',
                'status' => 'draft',
            ],
        ]);
    }
}
