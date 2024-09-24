<?php

namespace App\Http\Controllers;

use App\Exports\PersonalAcademicoExport;
use App\Models\Criterio;
use App\Models\Escala;
use App\Models\Evaluacion;
use App\Models\Subcriterio;
use App\Models\Universidad;
use App\Models\ValidacionLineamiento;
use Maatwebsite\Excel\Excel;

class PersonalAcademicoController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $sub_criterios = Subcriterio::where('criterio_id', 3)->get();
        $criterio = Criterio::find(3);
        $lineamientos16 = ValidacionLineamiento::where('indicador_id', 16)->get();
        $lineamientos17 = ValidacionLineamiento::where('indicador_id', 17)->get();
        $lineamientos19 = ValidacionLineamiento::where('indicador_id', 19)->get();
        $lineamientos21 = ValidacionLineamiento::where('indicador_id', 21)->get();
        $lineamientos22 = ValidacionLineamiento::where('indicador_id', 22)->get();
        $escalas = Escala::all();

        return view('acreditacion_caces.personal_academico.index', [
            'evaluacion'=>$evaluacion,
            'sub_criterios'=> $sub_criterios,
            'lineamientos16' => $lineamientos16,
            'lineamientos17' => $lineamientos17,
            'lineamientos19' => $lineamientos19,
            'lineamientos21' => $lineamientos21,
            'lineamientos22' => $lineamientos22,
            'criterio' => $criterio,
            'escalas' => $escalas
        ]);
    }

    public function personalAcademicoExcel($id)
    {   
        $evaluacion = Evaluacion::find($id);
        $criterios = Criterio::all();
        return (new PersonalAcademicoExport($evaluacion, $criterios))->download('Oportudidad_de_mejora.xlsx', Excel::XLSX);
    }
}
