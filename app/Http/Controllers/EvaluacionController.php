<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluacionController extends Controller
{
    public function index($id)
    {
        $universidad = Universidad::find($id);
        $evaluaciones = Evaluacion::where('uni_id', $id)->get();
        return view('acreditacion_caces.evaluaciones.index', compact('universidad', 'evaluaciones'));
    }

    public function store(Request $request){
        $evaluacion = $request->except('_token');
        $id = $request->uni_id;
        $evaluacion['fecha_creacion'] = date('Y-m-d');
        $evaluacion['administrador'] = Auth::user()->id;
        Evaluacion::insert($evaluacion);
        return redirect()->route('evaluaciones.index', $id);
    } 
}
