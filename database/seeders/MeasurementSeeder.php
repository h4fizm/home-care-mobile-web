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
                'age' => 25,
                'gender' => 'laki-laki',
                'sistolik' => 120,
                'diastolik' => 80,
                'bpm' => 75,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 25,
                'gender' => 'laki-laki',
                'sistolik' => 130,
                'diastolik' => 85,
                'bpm' => 80,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 20,
                'gender' => 'perempuan',
                'sistolik' => 110,
                'diastolik' => 70,
                'bpm' => 72,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 20,
                'gender' => 'laki-laki',
                'sistolik' => 140,
                'diastolik' => 90,
                'bpm' => 85,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'age' => 20,
                'gender' => 'perempuan',
                'sistolik' => 125,
                'diastolik' => 78,
                'bpm' => 77,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
