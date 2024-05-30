<?php

namespace Database\Seeders;

use App\Models\ChronoStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChronoStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'break'=> 'El empleado tendra un descanso corto',
            'lunch'=> 'El empleado estará en su hora de almuerzo',
            'coaching' => 'El empleado estara en formación o retroalimentación',
            'bathroom'=> 'El  empleado hara una ida al  baño',
            'active_pause' =>'El empleado tomara una pausa activa'
                   
        ];

        foreach ($statuses as $name => $description) {
            ChronoStatus::create([
                'name'=> $name, 
                'description' => $description, 
            ]);
        }
    }
}
