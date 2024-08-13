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

class IndicadorController extends Controller
{
    public function index($id)
    {
        $evaluacion = Evaluacion::find($id);
        $total_criterio_1 = $this->calcularPorcentajeCriterio1($id);
        $total_criterio_2 = $this->calcularPorcentajeCriterio2($id);
        $total_criterio_3 = $this->calcularPorcentajeCriterio3($id);
        $total_criterio_4 = $this->calcularPorcentajeCriterio4($id);
        $total_criterio_5 = $this->calcularPorcentajeCriterio5($id);
        $total_criterio_6 = $this->calcularPorcentajeCriterio6($id);
        return view('acreditacion_caces.indicador.index', compact('evaluacion', 'total_criterio_1', 'total_criterio_2', 'total_criterio_3', 'total_criterio_4', 'total_criterio_5', 'total_criterio_6'));
    }

    public function calcularPorcentajeCriterio1($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_1 = Criterio::where('id', 1)->first();
        $suma_elementos_criterio_1 = ResCondicionInstitucion::where('criterio_id', 1)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $total = $criterio_1->porcentaje != 0 ? round(($suma_elementos_criterio_1 * 100) / ($criterio_1->porcentaje), 2) : 0;
        return $total > 100 ? 100 : $total;
    }

    public function calcularPorcentajeCriterio2($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio_2 = Criterio::where('id', 2)->first();
        $suma_elementos_criterio_2 = ResDocente::where('criterio_id', 2)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->sum('porcentaje');
        $total = $criterio_2->porcentaje != 0 ? round(($suma_elementos_criterio_2 * 100) / ($criterio_2->porcentaje), 2) : 0;
        return $total > 100 ? 100 : $total;
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
        $total = $criterio_3->porcentaje != 0 ?  round((($suma_elementos_criterio_3 + $suma_formula_indicador_16 + $suma_formula_indicador_17 + $suma_formula_indicador_19 + $suma_formula_indicador_21 + $suma_formula_indicador_22) * 100) / ($criterio_3->porcentaje), 2) : 0;
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

        $total = $criterio_5->porcentaje != 0 ? round((($suma_elementos_criterio_5 + $suma_formulas_criterio_5) * 100) / ($criterio_5->porcentaje), 2) : 0;
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

    public function resultadoCriterio1($id)
    {
        $criterio = Criterio::find(1);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_1 = ResCondicionInstitucion::where('criterio_id', 1)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_1 = ResCondicionInstitucion::where('indicador_id', 1)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_2 = ResCondicionInstitucion::where('indicador_id', 2)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_3 = ResCondicionInstitucion::where('indicador_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_4 = ResCondicionInstitucion::where('indicador_id', 4)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_5 = ResCondicionInstitucion::where('indicador_id', 5)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_6 = ResCondicionInstitucion::where('indicador_id', 6)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_7 = ResCondicionInstitucion::where('indicador_id', 7)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_8 = ResCondicionInstitucion::where('indicador_id', 8)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_9 = ResCondicionInstitucion::where('indicador_id', 9)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_1 = $this->calcularPorcentajeCriterio1($id);

        return view('acreditacion_caces.resultados.criterio_1.index', compact('criterio', 'evaluacion', 'total_criterio_1', 'elementos_criterio_1', 'elementos_fundamental_1', 'elementos_fundamental_2', 'elementos_fundamental_3', 'elementos_fundamental_4', 'elementos_fundamental_5', 'elementos_fundamental_6', 'elementos_fundamental_7', 'elementos_fundamental_8', 'elementos_fundamental_9'));
    }

    public function resultadoCriterio2($id)
    {
        $criterio = Criterio::find(2);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_2 = ResDocente::where('criterio_id', 2)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_10 = ResDocente::where('indicador_id', 10)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_11 = ResDocente::where('indicador_id', 11)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_12 = ResDocente::where('indicador_id', 12)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_2 = $this->calcularPorcentajeCriterio2($id);
        return view('acreditacion_caces.resultados.criterio_2.index', compact('criterio', 'evaluacion', 'total_criterio_2', 'elementos_criterio_2', 'elementos_fundamental_10', 'elementos_fundamental_11', 'elementos_fundamental_12'));
    }

    public function resultadoCriterio3($id)
    {
        $criterio = Criterio::find(3);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_3 = ResAcademico::where('criterio_id', 3)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_13 = ResAcademico::where('indicador_id', 13)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_14 = ResAcademico::where('indicador_id', 14)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_15 = ResAcademico::where('indicador_id', 15)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_16 = ResIndicador16::where('indicador_id', 16)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_17 = ResIndicador17::where('indicador_id', 17)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_18 = ResAcademico::where('indicador_id', 18)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_19 = ResIndicador19::where('indicador_id', 19)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_20 = ResAcademico::where('indicador_id', 20)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_21 = ResIndicador21::where('indicador_id', 21)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_22 = ResIndicador22::where('indicador_id', 22)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_23 = ResAcademico::where('indicador_id', 23)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_3 = $this->calcularPorcentajeCriterio3($id);
        return view('acreditacion_caces.resultados.criterio_3.index', compact('criterio', 'evaluacion', 'total_criterio_3', 'elementos_criterio_3', 'elementos_fundamental_13', 'elementos_fundamental_14', 'elementos_fundamental_15', 'elementos_fundamental_16', 'elementos_fundamental_17', 'elementos_fundamental_18', 'elementos_fundamental_19', 'elementos_fundamental_20', 'elementos_fundamental_21', 'elementos_fundamental_22', 'elementos_fundamental_23'));
    }

    public function resultadoCriterio4($id)
    {
        $criterio = Criterio::find(4);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_4 = ResInvestigacion::where('criterio_id', 4)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_24 = ResInvestigacion::where('indicador_id', 24)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_25 = ResIndicador25::where('indicador_id', 25)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_26 = ResIndicador26::where('indicador_id', 26)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_4 = $this->calcularPorcentajeCriterio4($id);
        return view('acreditacion_caces.resultados.criterio_4.index', compact('criterio', 'evaluacion', 'total_criterio_4', 'elementos_criterio_4', 'elementos_fundamental_24', 'elementos_fundamental_25', 'elementos_fundamental_26'));
    }

    public function resultadoCriterio5($id)
    {
        $criterio = Criterio::find(5);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_5 = ResVinculacion::where('criterio_id', 5)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_27 = ResVinculacion::where('indicador_id', 27)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_28 = ResVinculacion::where('indicador_id', 28)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_29 = ResIndicador29::where('indicador_id', 29)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_5 = $this->calcularPorcentajeCriterio5($id);
        return view('acreditacion_caces.resultados.criterio_5.index', compact('criterio', 'evaluacion', 'total_criterio_5', 'elementos_criterio_5', 'elementos_fundamental_27', 'elementos_fundamental_28', 'elementos_fundamental_29'));
    }

    public function resultadoCriterio6($id)
    {
        $criterio = Criterio::find(6);
        $evaluacion = Evaluacion::find($id);
        $elementos_criterio_6 = ResGestionCalidad::where('criterio_id', 6)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_30 = ResGestionCalidad::where('indicador_id', 30)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_31 = ResGestionCalidad::where('indicador_id', 31)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $elementos_fundamental_32 = ResGestionCalidad::where('indicador_id', 32)->where('evaluacion_id', $id)->where('universidad_id', $evaluacion->universidad->id)->get();
        $total_criterio_6 = $this->calcularPorcentajeCriterio6($id);
        return view('acreditacion_caces.resultados.criterio_6.index', compact('criterio', 'evaluacion', 'total_criterio_6', 'elementos_criterio_6', 'elementos_fundamental_30', 'elementos_fundamental_31', 'elementos_fundamental_32'));
    }
}
