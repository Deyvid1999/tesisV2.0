<?php

namespace Database\Seeders;

use App\Models\EscalaDocente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscalaDocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $escalas =[
            [
                'escala' => "SATISFACTORIO",
                'porcentaje' => 100,
            ],
            [
                'escala' => "DEFICIENTE",
                'porcentaje' => 0,
            ],
        ];

        foreach ($escalas as $escala) {
            EscalaDocente::create($escala);
        }
    }
}
