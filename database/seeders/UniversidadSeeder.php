<?php

namespace Database\Seeders;

use App\Models\Universidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universidad::create([
            'universidad' => 'UNIVERSIDAD DEL PACIFICO',
            'foto' => 'uploads/universidades/UNIVERSIDAD DEL PACIFICO//foto.jpg',
            'campus' => 'QUITO',
            'sede' => 'QUITO',
            'ciudad' => 'QUITO',
            'facultad' => 'FACULTAD DE CIENCIAS ADMINISTRATIVAS Y ECONOMICAS',
            'departamento' => 'ADMINISTRACION DE EMPRESAS',
            'fecha_evaluacion' => '2021-01-01',
            'evaluadores' => 'ING. JUAN PEREZ',
            'contraparte' => 'ING. JUAN PEREZ',
            'informe' => 'uploads/universidades/UPACIFICO/informe.pdf',
        ]);
    }
}
