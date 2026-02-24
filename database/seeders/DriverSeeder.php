<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            [
                'user_id' => 2,
                'driver_code' => 'DRV-001',
                'no_license' => 'SIM123456',
                'status' => 'active',
            ],
            [
                'user_id' => 3,
                'driver_code' => 'DRV-002',
                'no_license' => 'SIM123455',
                'status' => 'active',
            ],
            [
                'user_id' => 4,
                'driver_code' => 'DRV-003',
                'no_license' => 'SIM123466',
                'status' => 'active',
            ],
        ]);
    }
}
