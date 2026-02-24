<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DriverSeeder::class,
            RouteCategoriesSeeder::class,
            RoutesSeeder::class,
            BonusRulesSeeder::class,
            JobOrderSeeder::class,
            RitaseSeeder::class,
        ]);
    }
}
