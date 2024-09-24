<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evaluacion;
use App\Models\Resultado;

class IndicadorController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $total_criterio_1 = $this->calcularPorcentajeCriterio($id,1);
        $total_criterio_2 = $this->calcularPorcentajeCriterio($id,2);
        $total_criterio_3 = $this->calcularPorcentajeCriterio($id,3);
        $total_criterio_4 = $this->calcularPorcentajeCriterio($id,4);
        $total_criterio_5 = $this->calcularPorcentajeCriterio($id,5);
        $total_criterio_6 = $this->calcularPorcentajeCriterio($id,6);
        $criterios=Criterio::all();
        return view('acreditacion_caces.indicador.index', compact('evaluacion', 'total_criterio_1', 'total_criterio_2', 'total_criterio_3', 'total_criterio_4', 'total_criterio_5', 'total_criterio_6','criterios'));
    }

    
    public function calcularPorcentajeCriterio($idEvaluacion,$idCriterio)
    {
        $suma_elementos_criterio=0;
        if(!Criterio::where('id',$idCriterio)->get()->first()->subcriterios->isEmpty()){
            $suma_elementos_criterio=Resultado::whereHas('elemento_fundamental.indicador.subcriterio.criterio', function($query) use ($idCriterio){
                $query->where('id',$idCriterio);
            })-> where('eva_id',$idEvaluacion)->sum('resultado');
            $criterioPorcentaje=Criterio::where('id',$idCriterio)->get()->first()->porcentaje;
            $suma_elementos_criterio=round($suma_elementos_criterio*100/$criterioPorcentaje,0);
        }
        else{
            $suma_elementos_criterio=Resultado::whereHas('elemento_fundamental.indicador.criterio', function($query) use ($idCriterio){
                $query->where('id',$idCriterio);
            })-> where('eva_id',$idEvaluacion)->sum('resultado');
            $criterioPorcentaje=Criterio::where('id',$idCriterio)->get()->first()->porcentaje;
            $suma_elementos_criterio=round($suma_elementos_criterio*100/$criterioPorcentaje,0);
        }
        return $suma_elementos_criterio;
    }
}
