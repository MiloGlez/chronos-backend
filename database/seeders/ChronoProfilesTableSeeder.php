<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChronoProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chrono_profiles')->insert([
            ['name' => 'Administrador'],
            ['name' => 'Empleado'],
        ]);
    }
}
