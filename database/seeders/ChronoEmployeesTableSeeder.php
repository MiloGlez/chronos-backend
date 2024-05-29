<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChronoEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gerenteId = DB::table('chrono_jobs')->where('name', 'Gerente')->first()->id;
        $asesorId = DB::table('chrono_jobs')->where('name', 'Asesor')->first()->id;
        $contadorId = DB::table('chrono_jobs')->where('name', 'Contador')->first()->id;

        $adminId = DB::table('chrono_profiles')->where('name', 'Administrador')->first()->id;
        $empleadoId = DB::table('chrono_profiles')->where('name', 'Empleado')->first()->id;

        $employees = [
            [
                'name' => 'Camilo',
                'last_namme' => 'González',
                'phone' => '1234567890',
                'email' => 'camilo@example.com',
                'password' => Hash::make('password'),
                'profile_id' => $adminId,
                'job_id' => $gerenteId
            ],
            [
                'name' => 'Duvan',
                'last_namme' => 'Henao',
                'phone' => '1234567890',
                'email' => 'duvan@example.com',
                'password' => Hash::make('password'),
                'profile_id' => $empleadoId,
                'job_id' => $asesorId
            ],
            [
                'name' => 'Juliana',
                'last_namme' => 'Peña',
                'phone' => '1234567890',
                'email' => 'juliana@example.com',
                'password' => Hash::make('password'),
                'profile_id' => $adminId,
                'job_id' => $contadorId
            ],
            [
                'name' => 'Juan',
                'last_namme' => 'Atehortua',
                'phone' => '1234567890',
                'email' => 'juan@example.com',
                'password' => Hash::make('password'),
                'profile_id' => $empleadoId,
                'job_id' => $gerenteId
            ]
        ];

        foreach ($employees as $employee) {
            DB::table('chrono_employees')->insert($employee);
        }
    }
}

