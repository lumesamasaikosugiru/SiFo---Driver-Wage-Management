<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('job_orders')->insert([
            [
                'job_order_number' => 'job-no-0001',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0002',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0003',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0004',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0005',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0006',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0007',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0008',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0009',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
            [
                'job_order_number' => 'job-no-0010',
                'vehicle_number' => 'A2026C',
                'load_address' => 'Jl. Balaraja',
                'unload_address' => 'Jl. Cilegon',
                'distance_km' => '400',
                'cargo_name' => 'Kacang Kedelai',
                'load_tonnage' => '3500',
                'unload_tonnage' => '3500',
                'delivery_note_photo' => 'foto-surat-jalan',
                'unload_note_photo' => 'foto-surat-bongkar',
                'status' => 'on_delivery',
            ],
        ]);
    }
}
