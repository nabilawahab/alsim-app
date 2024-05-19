<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlsimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alsims = [
            [
                'nama' => 'Line Alsim 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Line Alsim 3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('alsims')->insert($alsims);
    }
}
