<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BonusRulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bonus_rules')->insert([
            [
                'name' => 'Performance - Ritase-1',
                'type' => 'ritase',
                'min_value' => '3',
                'max_value' => '5',
                'bonus_value' => '1000000',
                'route_category_id' => '1',
                'is_active' => '1',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
            [
                'name' => 'Performance - Ritase-2',
                'type' => 'ritase',
                'min_value' => '6',
                'max_value' => '10',
                'bonus_value' => '2000000',
                'route_category_id' => '2',
                'is_active' => '1',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
            [
                'name' => 'Performance - KKM-1',
                'type' => 'distance',
                'min_value' => '300',
                'max_value' => '500',
                'bonus_value' => '1000000',
                'route_category_id' => '1',
                'is_active' => '1',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
            [
                'name' => 'Performance - KKM-2',
                'type' => 'distance',
                'min_value' => '501',
                'max_value' => '700',
                'bonus_value' => '2000000',
                'route_category_id' => '2',
                'is_active' => '1',
                'valid_from' => '2026-02-12',
                'valid_until' => '2027-02-12',
            ],
        ]);
    }
}
