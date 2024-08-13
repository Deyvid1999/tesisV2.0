<?php

namespace Database\Seeders;

use App\Models\ValidacionLineamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValidacionLineamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lineamientos = [
            [
                'indicador_id' => 16,
                'lineamiento' => 'Para la validación del personal académico con formación doctoral (PhD) se verifica la información reportada en el SIIES, referente a: personal académico, formación académica, relación con la IES, fecha inicio y fecha fin, especificadas en la fuente de información. Para el cálculo se considerará los títulos registrados en SENESCYT, en el caso que no estén registrados la UEP deberá cargar la evidencia del título para que sea validado y aceptado',
            ],
            [
                'indicador_id' => 16,
                'lineamiento' => 'Para el caso de la variable TP: Total del personal académico de la institución vinculado en el periodo de evaluación se consideran todos los reportados en el SIIES, información que podrá ser contrastada con el MDT, IESS o SRI',
            ],
            [
                'indicador_id' => 16,
                'lineamiento' => 'En el caso de que se presente más de una relación laboral simultánea (posgrados o unidades tecnológicas) se les considerará como un registro único',
            ],
            [
                'indicador_id' => 16,
                'lineamiento' => 'Para el cálculo de este indicador se toman en cuenta a los profesores vinculados en el periodo de evaluación (no se considera profesores invitados para este indicador)',
            ],
            [
                'indicador_id' => 16,
                'lineamiento' => 'Todos los docentes que participan en programas de doctorados deben tener formación doctoral',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'La tasa del personal académico con dedicación a tiempo completo se debe cumplir en cada periodo académico reportado en oferta académica de grado para las UEP que ofertan grado y posgrado',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'La tasa del personal académico con dedicación a tiempo completo se debe cumplir en cada periodo académico reportado para las UEP que únicamente tienen oferta de posgrado',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'Para la validación de la variable PTC se verifica la información reportada en el SIIES, referente a: categoría, tiempo de dedicación, relación IES, fecha inicio y fecha fin, distributivo de horas de acuerdo con el periodo académico, especificadas en la fuente de información. Para el cálculo se considerará únicamente los datos validados',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'Para el caso de la variable TP: Total del personal académico de la institución vinculado en el periodo de evaluación se consideran todos los reportados en el SIIES, información que podrá ser contrastada con el MDT, IESS o SRI',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'En el caso de que se presente más de una relación laboral simultánea (Ej. Posgrados y unidades tecnológicas) se considerará al personal académico como registro único, tomando la dedicación de tiempo completo si la hubiere',
            ],
            [
                'indicador_id' => 17,
                'lineamiento' => 'Para el cálculo de este indicador se toma en cuenta al personal académico vinculado en el periodo de evaluación',
            ],
            [
                'indicador_id' => 19,
                'lineamiento' => 'Para el cálculo de este indicador se considerarán únicamente los estudiantes que iniciaron el primer período académico de la carrera',
            ],
            [
                'indicador_id' => 19,
                'lineamiento' => 'El indicador contempla los estudiantes que realizaron cambio de carrera (continúan en la institución)',
            ],
            [
                'indicador_id' => 19,
                'lineamiento' => 'En el indicador se contempla los estudiantes que desertaron, pero retornaron a sus estudios en Ai+2',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'Se calcularán todas las tasas de titulación de las cohortes iniciadas en el periodo de evaluación que cumplan con el periodo de duración de las carreras más un año adicional',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'Se considerarán los estudiantes que se graduaron hasta la finalización del último periodo académico concluido antes del inicio del proceso de evaluación, según las cohortes',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'No se considerará para el cálculo de este indicador estudiantes que hayan realizado convalidación',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'Para las UEP que no cuenten con oferta de grado no aplica este indicador',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'En el cálculo de este indicador se consideran estudiantes que desertaron y no regresan a la institución',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'En el caso de estudiantes que realizan cambios de carrera, se considerarán en la cohorte de la nueva carrera',
            ],
            [
                'indicador_id' => 21,
                'lineamiento' => 'En el caso de que la UEP realice rediseños de carrera y homologuen a los estudiantes a la misma, se considerará el periodo de duración de la carrera rediseñada. La cohorte de inicio seguirá siendo la misma',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'Se calcularán todas las tasas de titulación de las cohortes iniciadas en el periodo de evaluación que cumplan con el periodo de duración de los programas más un año adicional',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'Se considerarán los estudiantes que se graduaron hasta la finalización del último periodo académico concluido antes del inicio del proceso deevaluación, según las cohortes',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'No se considerará para el cálculo de este indicador estudiantes que hayan realizado convalidación',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'Para las UEP que no cuenten con oferta de posgrado no aplica este indicador',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'En el cálculo de este indicador no se considera estudiantes que desertaron y la institución justifica su retiro formal',
            ],
            [
                'indicador_id' => 22,
                'lineamiento' => 'En el caso de estudiantes que realizan cambios de programa, se considerarán en la cohorte del nuevo programa',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Para el cálculo de estas variables se realiza la validación de la información reportada en el SIIES, referente a: proyecto de investigación o innovación que incluya por lo menos los siguientes datos: nombre del proyecto, título, línea de investigación o dominio académico relacionado, objetivos, responsable, participantes, tiempo de ejecución, financiamiento, metodología considerada, desarrollo y resultados',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Los proyectos de investigación e innovación de la institución pueden ser financiados con fondos internos o externos, lo cual dependerá de la organización y planificación de la UEP, con su debido sustento documental',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Para los proyectos de investigación o innovación financiados con fondos externos, se deberá presentar los sustentos o evidencias correspondientes',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Para los proyectos de investigación o innovación en redes internacionales o nacionales, se deberá presentar los sustentos o evidencias correspondientes',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Los proyectos de investigación o innovación desarrollados con clústers se consideran como proyectos en red',
            ],
            [
                'indicador_id' => 25,
                'lineamiento' => 'Se contará como uno al proyecto que pueda tener financiamiento y desarrollados en red',
            ],
            [
                'indicador_id' => 26,
                'lineamiento' => 'Para el caso de las variables PTC y PMT: Total del personal académico de la institución vinculado en el último año concluido antes del proceso de evaluación',
            ],
        ];
        
        foreach ($lineamientos as $lineamiento) {
            ValidacionLineamiento::create($lineamiento);
        }
    }
}
