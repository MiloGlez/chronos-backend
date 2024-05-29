<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChronoJobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chrono_jobs')->insert([
            ['name' => 'Gerente'],
            ['name' => 'Asesor'],
            ['name' => 'Contador'],
        ]);
    }
}

