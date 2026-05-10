<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            [
                'name' => 'Kota Bandung',
                'latitude' => -6.917500,
                'longitude' => 107.619100,
                'province' => 'Jawa Barat',
                'island' => 'Jawa',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Jakarta',
                'latitude' => -6.208800,
                'longitude' => 106.845600,
                'province' => 'DKI Jakarta',
                'island' => 'Jawa',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Yogyakarta',
                'latitude' => -7.795600,
                'longitude' => 110.369500,
                'province' => 'DI Yogyakarta',
                'island' => 'Jawa',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Surabaya',
                'latitude' => -7.257500,
                'longitude' => 112.752100,
                'province' => 'Jawa Timur',
                'island' => 'Jawa',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Denpasar',
                'latitude' => -8.670500,
                'longitude' => 115.212600,
                'province' => 'Bali',
                'island' => 'Bali',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Medan',
                'latitude' => 3.595200,
                'longitude' => 98.672200,
                'province' => 'Sumatera Utara',
                'island' => 'Sumatera',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Makassar',
                'latitude' => -5.147700,
                'longitude' => 119.432700,
                'province' => 'Sulawesi Selatan',
                'island' => 'Sulawesi',
                'is_foreign' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Tokyo',
                'latitude' => 35.676200,
                'longitude' => 139.650300,
                'province' => 'Tokyo',
                'island' => 'Honshu',
                'is_foreign' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Singapore',
                'latitude' => 1.352100,
                'longitude' => 103.819800,
                'province' => 'Singapore',
                'island' => 'Singapore',
                'is_foreign' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}