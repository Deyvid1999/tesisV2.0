<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Evaluacion;
use App\Models\ResAcademico;
use App\Models\ResCondicionInstitucion;
use App\Models\ResDocente;
use App\Models\ResGestionCalidad;
use App\Models\ResIndicador16;
use App\Models\ResIndicador17;
use App\Models\ResIndicador19;
use App\Models\ResIndicador21;
use App\Models\ResIndicador22;
use App\Models\ResIndicador25;
use App\Models\ResIndicador26;
use App\Models\ResIndicador29;
use App\Models\ResInvestigacion;
use App\Models\ResVinculacion;
use App\Models\Universidad;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    public function index($id)
    {

        $universidad = Universidad::find($id);
        $evaluaciones = Evaluacion::where('universidad_id', $id)->get();
        $evaluacion = Evaluacion::find(1);
        $criterios = Criterio::all();
        return view('acreditacion_caces.historial.index', compact('universidad', 'evaluaciones', 'criterios', 'evaluacion'));
    }

    public function grafico($id)
    {
        $fecha_evalucaion = [];
        $resultados_criterio_1 = [];
        $resultados_criterio_2 = [];
        $resultados_criterio_3 = [];
        $resultados_criterio_4 = [];
        $resultados_criterio_5 = [];
        $resultados_criterio_6 = [];
        $universidad = Universidad::find($id);
        $criterios = Criterio::all();
        $evaluaciones = Evaluacion::where('universidad_id', $id)->get();
        foreach ($evaluaciones as $evaluacion) {
            $fecha_evalucaion[] = $evaluacion->fecha_creacion;
            $resultados_criterio_1[] = $this->calcularPorcentajeCriterio1($evaluacion->id);
            $resultados_criterio_2[] = $this->calcularPorcentajeCriterio2($evaluacion->id);
            $resultados_criterio_3[] = $this->calcularPorcentajeCriterio3($evaluacion->id);
            $resultados_criterio_4[] = $this->calcularPorcentajeCriterio4($evaluacion->id);
            $resultados_criterio_5[] = $this->calcularPorcentajeCriterio5($evaluacion->id);
            $resultados_criterio_6[] = $this->calcularPorcentajeCriterio6($evaluacion->id);
        }

        $resultado_total = [];
        foreach ($evaluaciones as $key => $evaluacion) {
            $resultado_total[] = [
                'fecha_evaluacion' => $fecha_evalucaion[$key],
                'criterio_1' => $resultados_criterio_1[$key],
                'criterio_2' => $resultados_criterio_2[$key],
                'criterio_3' => $resultados_criterio_3[$key],
                'criterio_4' => $resultados_criterio_4[$key],
                'criterio_5' => $resultados_criterio_5[$key],
                'criterio_6' => $resultados_criterio_6[$key],
            ];
        }
        // $total_criterio_1 = $this->calcularPorcentajeCriterio1($id);
        // $total_criterio_2 = $this->calcularPorcentajeCriterio2($id);
        // $total_criterio_3 = $this->calcularPorcentajeCriterio3($id);
        // $total_criterio_4 = $this->calcularPorcentajeCriterio4($id);
        // $total_criterio_5 = $this->calcularPorcentajeCriterio5($id);
        // $total_criterio_6 = $this->calcularPorcentajeCriterio6($id);
        return view('acreditacion_caces.historial.grafico', compact('universidad', 'evaluaciones', 'criterios', 'resultado_total'));
    }

    public function calcularPorcentajeCriterio1($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_1 = Criterio::where('id', 1)->first();
        $suma_elementos_criterio_1 = ResCondicionInstitucion::where('criterio_id', 1)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $total = $criterio_1->porcentaje != 0 ?  round(($suma_elementos_criterio_1 * 100) / ($criterio_1->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }

    public function calcularPorcentajeCriterio2($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_2 = Criterio::where('id', 2)->first();
        $suma_elementos_criterio_2 = ResDocente::where('criterio_id', 2)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $total = $criterio_2->porcentaje != 0 ?  round(($suma_elementos_criterio_2 * 100) / ($criterio_2->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }

    public function calcularPorcentajeCriterio3($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_3 = Criterio::where('id', 3)->first();
        $suma_elementos_criterio_3 = ResAcademico::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $suma_formula_indicador_16 = ResIndicador16::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('tpafd_porcentaje');
        $suma_formula_indicador_17 = ResIndicador17::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('tptc_porcentaje');
        $suma_formula_indicador_19 = ResIndicador19::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('tdg2_porcentaje');
        $suma_formula_indicador_21 = ResIndicador21::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('ttg_porcentaje');
        $suma_formula_indicador_22 = ResIndicador22::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('ttp_porcentaje');
        $total = $criterio_3->porcentaje != 0 ? round((($suma_elementos_criterio_3 + $suma_formula_indicador_16 + $suma_formula_indicador_17 + $suma_formula_indicador_19 + $suma_formula_indicador_21 + $suma_formula_indicador_22) * 100) / ($criterio_3->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }

    public function calcularPorcentajeCriterio4($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_4 = Criterio::where('id', 4)->first();
        $suma_elementos_criterio_4 = ResInvestigacion::where('criterio_id', 4)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $suma_formula_indicador_25 = ResIndicador25::where('criterio_id', 4)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('ip_porcentaje');
        $suma_formula_indicador_26 = ResIndicador26::where('criterio_id', 4)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('ip_porcentaje');
        $total = $criterio_4->porcentaje != 0 ? round((($suma_elementos_criterio_4 + $suma_formula_indicador_25 + $suma_formula_indicador_26) * 100) / ($criterio_4->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }

    public function calcularPorcentajeCriterio5($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_5 = Criterio::where('id', 5)->first();
        $suma_elementos_criterio_5 = ResVinculacion::where('criterio_id', 5)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $suma_formulas_criterio_5 = ResIndicador29::where('criterio_id', 5)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->value('ipv_porcentaje');

        $total = $criterio_5->porcentaje != 0 ?  round((($suma_elementos_criterio_5 + $suma_formulas_criterio_5) * 100) / ($criterio_5->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }

    public function calcularPorcentajeCriterio6($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_6 = Criterio::where('id', 6)->first();
        $suma_elementos_criterio_6 = ResGestionCalidad::where('criterio_id', 6)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $total = $criterio_6->porcentaje != 0 ?  round(($suma_elementos_criterio_6 * 100) / ($criterio_6->porcentaje), 2) : 0;
        if ($total > 100) {
            $total = 100;
        } else {
            $total = $total;
        }
        return $total;
    }
}
