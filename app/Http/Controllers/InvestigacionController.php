<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EscalaCualitativo;
use App\Models\Evaluacion;
use App\Models\Subcriterio;
use App\Models\Universidad;
use App\Models\ValidacionLineamiento;
use Illuminate\Http\Request;

class InvestigacionController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(4);
        $sub_criterios = Subcriterio::where('criterio_id', 4)->get();
        $lineamientos25 = ValidacionLineamiento::where('indicador_id', 25)->get();
        $lineamientos26 = ValidacionLineamiento::where('indicador_id', 26)->get();
        $escalas = EscalaCualitativo::all();       

        return view('acreditacion_caces.investigacion.index', [
            'evaluacion' => $evaluacion,
            'sub_criterios' => $sub_criterios,
            'lineamientos25'=> $lineamientos25,
            'lineamientos26'=> $lineamientos26,
            'criterio' => $criterio,
            'escalas' => $escalas
        ]);
    }
}
