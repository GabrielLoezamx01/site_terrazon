<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'En la ciudad',
                'status' => true,
                'icon' => 'city-icon.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'En la playa',
                'status' => true,
                'icon' => 'beach-icon.svg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
