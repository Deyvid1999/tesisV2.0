<?php

namespace Database\Seeders;

use App\Models\EscalaCualitativo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscalaCualitativoSeeder extends Seeder
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
                'escala' => "CUASI SATISFACTORIO",
                'porcentaje' => 75,
            ],
            [
                'escala' => "POCO SATISFACTORIO",
                'porcentaje' => 50,
            ],
            [
                'escala' => "DEFICIENTE",
                'porcentaje' => 25,
            ],
        ];

        foreach ($escalas as $escala) {
            EscalaCualitativo::create($escala);
        }

    }
}
