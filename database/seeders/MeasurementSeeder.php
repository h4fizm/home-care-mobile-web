<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('measurements')->insert([
            [
                'sistolik' => 120,
                'diastolik' => 80,
                'bpm' => 75,
                'id_patient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sistolik' => 130,
                'diastolik' => 85,
                'bpm' => 80,
                'id_patient' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sistolik' => 110,
                'diastolik' => 70,
                'bpm' => 72,
                'id_patient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sistolik' => 140,
                'diastolik' => 90,
                'bpm' => 85,
                'id_patient' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sistolik' => 125,
                'diastolik' => 78,
                'bpm' => 77,
                'id_patient' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
