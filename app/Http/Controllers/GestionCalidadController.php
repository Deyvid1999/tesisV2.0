<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EscalaCualitativo;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResGestionCalidad;
use App\Models\Universidad;
use Illuminate\Http\Request;

class GestionCalidadController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(6);
        $indicadores = Indicador::where('criterio_id', 6)->get();
        $escalas = EscalaCualitativo::all();
        return view('acreditacion_caces.gestion_calidad.index', compact('evaluacion', 'indicadores','criterio','escalas'));
    }

    public function store(Request $request)
    {

        try {
            $universidad_id = $request->universidad_id;
            $evaluacion_id = $request->evaluacion_id;
            $criterio_id = $request->criterio_id;            
            $datos = $request->except('_token', 'universidad_id', 'evaluacion_id', 'criterio_id');            
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['elemento_fundamental_id'] = $key;
                $item['universidad_id'] = $universidad_id;
                $item['evaluacion_id'] = $evaluacion_id;
                $item['criterio_id'] = $criterio_id;
                $item['user_id'] = auth()->user()->id;
                // dd($item);
                $id = ResGestionCalidad::where('elemento_fundamental_id', $key)->get()->first();
                if ($id != null) {
                    //update
                    ResGestionCalidad::where('elemento_fundamental_id', $key)->update($item);
                } else {
                    //insert

                    ResGestionCalidad::insert($item);
                }
            }
            return redirect()->route('gestion.calidad.index', $evaluacion_id)->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('gestion.calidad.index', $evaluacion_id)->with('error', 'Error al crear el registro');
        }
    }

}
