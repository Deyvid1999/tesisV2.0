<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EscalaDocente;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResDocente;
use App\Models\Universidad;
use Illuminate\Http\Request;

class DocenciaController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(2);
        $indicadores = Indicador::where('criterio_id', 2)->get();
        $escalas = EscalaDocente::all();
        return view('acreditacion_caces.docencia.index', compact('evaluacion', 'indicadores', 'criterio', 'escalas'));
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
                $id = ResDocente::where('elemento_fundamental_id', $key)->get()->first();
                if ($id != null) {
                    //update
                    ResDocente::where('elemento_fundamental_id', $key)->update($item);
                } else {
                    //insert

                    ResDocente::insert($item);
                }
            }
            return redirect()->route('docencia.index', $evaluacion_id)->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('docencia.index', $evaluacion_id)->with('error', 'Error al crear el registro');
        }
    }
}
