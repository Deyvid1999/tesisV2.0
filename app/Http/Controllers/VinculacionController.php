<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Escala;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador29;
use App\Models\ResVinculacion;
use App\Models\Universidad;
use Illuminate\Http\Request;

class VinculacionController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $indicadores = Indicador::all();
        $criterio = Criterio::find(5);
        $escalas = Escala::all();
        return view('acreditacion_caces.vinculacion.index', [
            'evaluacion' => $evaluacion,
            'indicadores' => $indicadores,
            'criterio' => $criterio,
            'escalas' => $escalas
        ]);
    }

    public function store(Request $request)
    {

        // try {
            $universidad_id = $request->universidad_id;
            $evaluacion_id = $request->evaluacion_id;
            $criterio_id = $request->criterio_id;
            $datos = $request->except('_token', 'universidad_id', 'evaluacion_id', 'criterio_id');
            unset($datos['29']);
            $datos_29 = $request->only('29');            
            
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['elemento_fundamental_id'] = $key;
                $item['universidad_id'] = $universidad_id;
                $item['evaluacion_id'] = $evaluacion_id;
                $item['criterio_id'] = $criterio_id;
                $item['user_id'] = auth()->user()->id;
                // dd($item);
                $id = ResVinculacion::where('elemento_fundamental_id', $key)->get()->first();
                if ($id != null) {
                    //update
                    ResVinculacion::where('elemento_fundamental_id', $key)->update($item);
                } else {
                    //insert
                    ResVinculacion::insert($item);
                }
            }

            foreach ($datos_29 as $key => $item) {
                // dd($item);
                $item['indicador_id'] = $key;
                $item['universidad_id'] = $universidad_id;
                $item['evaluacion_id'] = $evaluacion_id;
                $item['criterio_id'] = $criterio_id;
                $item['user_id'] = auth()->user()->id;
                // dd($item);
                $id = ResIndicador29::where('indicador_id', $key)->get()->first();
                if ($id != null) {
                    //update
                    ResIndicador29::where('indicador_id', $key)->update($item);
                } else {
                    //insert
                    ResIndicador29::insert($item);
                }
            }
            
            return redirect()->route('vinculacion.index', $evaluacion_id)->with('success', 'Registro exitoso.');
        // } catch (\Exception $e) {
        //     return redirect()->route('vinculacion.index', $evaluacion_id)->with('error', 'Error al crear el registro');
        // }
    }
}
