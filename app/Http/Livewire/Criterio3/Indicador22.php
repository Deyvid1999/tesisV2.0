<?php

namespace App\Http\Livewire\Criterio3;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador22;
use Livewire\Component;

class Indicador22 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $n, $nept_1, $tec_1, $nept_2, $tec_2, $nept_3, $tec_3, $nept_4, $tec_4, $nept_5, $tec_5, $nept_6, $tec_6,
        $ttp, $ttp_porcentaje, $valoracion_22;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_22 = ResIndicador22::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->n = isset($res_indicador_22->n) ? $res_indicador_22->n : '1';
        $this->nept_1 = isset($res_indicador_22->nept_1) ? $res_indicador_22->nept_1 : '0';
        $this->tec_1 = isset($res_indicador_22->tec_1) ? $res_indicador_22->tec_1 : '1';
        $this->nept_2 = isset($res_indicador_22->nept_2) ? $res_indicador_22->nept_2 : '0';
        $this->tec_2 = isset($res_indicador_22->tec_2) ? $res_indicador_22->tec_2 : '1';
        $this->nept_3 = isset($res_indicador_22->nept_3) ? $res_indicador_22->nept_3 : '0';
        $this->tec_3 = isset($res_indicador_22->tec_3) ? $res_indicador_22->tec_3 : '1';
        $this->nept_4 = isset($res_indicador_22->nept_4) ? $res_indicador_22->nept_4 : '0';
        $this->tec_4 = isset($res_indicador_22->tec_4) ? $res_indicador_22->tec_4 : '1';
        $this->nept_5 = isset($res_indicador_22->nept_5) ? $res_indicador_22->nept_5 : '0';
        $this->tec_5 = isset($res_indicador_22->tec_5) ? $res_indicador_22->tec_5 : '1';
        $this->nept_6 = isset($res_indicador_22->nept_6) ? $res_indicador_22->nept_6 : '0';
        $this->tec_6 = isset($res_indicador_22->tec_6) ? $res_indicador_22->tec_6 : '1';
        $this->ttp = isset($res_indicador_22->ttp) ? $res_indicador_22->ttp : '0';
        $this->ttp_porcentaje = isset($res_indicador_22->ttp_porcentaje) ? $res_indicador_22->ttp_porcentaje : round($this->indicador->porcentaje * 0.25, 3);
        $this->valoracion_22 = isset($res_indicador_22->valoracion_22) ? $res_indicador_22->valoracion_22 : 'DEFICIENTE';
    }

    public function updatedN()
    {
        $this->calculo();
    }

    public function updatedNept1()
    {
        $this->calculo();
    }

    public function updatedTec1()
    {
        $this->calculo();
    }

    public function updatedNept2()
    {
        $this->calculo();
    }

    public function updatedTec2()
    {
        $this->calculo();
    }

    public function updatedNept3()
    {
        $this->calculo();
    }

    public function updatedTec3()
    {
        $this->calculo();
    }

    public function updatedNept4()
    {
        $this->calculo();
    }

    public function updatedTec4()
    {
        $this->calculo();
    }

    public function updatedNept5()
    {
        $this->calculo();
    }

    public function updatedTec5()
    {
        $this->calculo();
    }

    public function updatedNept6()
    {
        $this->calculo();
    }

    public function updatedTec6()
    {
        $this->calculo();
    }


    public function calculo()
    {
        try {
            if ($this->n == 1) {
                $this->ttp = round((1 / floatval($this->n)) * (floatval($this->nept_1) / floatval($this->tec_1)) * 100, 3);
            } elseif ($this->n == 2) {
                $this->ttp = round((1 / floatval($this->n)) * ((floatval($this->nept_1) / floatval($this->tec_1)) + (floatval($this->nept_2) / floatval($this->tec_2))) * 100, 3);
            } elseif ($this->n == 3) {
                $this->ttp = round((1 / floatval($this->n)) * ((floatval($this->nept_1) / floatval($this->tec_1)) + (floatval($this->nept_2) / floatval($this->tec_2)) + (floatval($this->nept_3) / floatval($this->tec_3))) * 100, 3);
            } elseif ($this->n == 4) {
                $this->ttp = round((1 / floatval($this->n)) * ((floatval($this->nept_1) / floatval($this->tec_1)) + (floatval($this->nept_2) / floatval($this->tec_2)) + (floatval($this->nept_3) / floatval($this->tec_3)) + (floatval($this->nept_4) / floatval($this->tec_4))) * 100, 3);
            } elseif ($this->n == 5) {
                $this->ttp = round((1 / floatval($this->n)) * ((floatval($this->nept_1) / floatval($this->tec_1)) + (floatval($this->nept_2) / floatval($this->tec_2)) + (floatval($this->nept_3) / floatval($this->tec_3)) + (floatval($this->nept_4) / floatval($this->tec_4)) + (floatval($this->nept_5) / floatval($this->tec_5))) * 100, 3);
            } elseif ($this->n == 6) {
                $this->ttp = round((1 / floatval($this->n)) * ((floatval($this->nept_1) / floatval($this->tec_1)) + (floatval($this->nept_2) / floatval($this->tec_2)) + (floatval($this->nept_3) / floatval($this->tec_3)) + (floatval($this->nept_4) / floatval($this->tec_4)) + (floatval($this->nept_5) / floatval($this->tec_5)) + (floatval($this->nept_6) / floatval($this->tec_6))) * 100, 3);
            }

            if ($this->ttp >= 82) {
                $this->valoracion_22 = 'SATISFACTORIO';
                $this->ttp_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->ttp >= 54 && $this->ttp < 82) {
                $this->valoracion_22 = 'CUASI SATISFACTORIO';
                $this->ttp_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->ttp >= 27 && $this->ttp < 54) {
                $this->valoracion_22 = 'POCO SATISFACTORIO';
                $this->ttp_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->ttp < 27) {
                $this->valoracion_22 = 'DEFICIENTE';
                $this->ttp_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->ttp = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio3.indicador22.view');
    }

    public function guardarIndicador22()
    {
        $res_indicador_22 = ResIndicador22::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_22) {
            $res_indicador_22->update([
                'n' => $this->n,
                'nept_1' => $this->nept_1,
                'tec_1' => $this->tec_1,
                'nept_2' => $this->nept_2,
                'tec_2' => $this->tec_2,
                'nept_3' => $this->nept_3,
                'tec_3' => $this->tec_3,
                'nept_4' => $this->nept_4,
                'tec_4' => $this->tec_4,
                'nept_5' => $this->nept_5,
                'tec_5' => $this->tec_5,
                'nept_6' => $this->nept_6,
                'tec_6' => $this->tec_6,
                'ttp' => $this->ttp,
                'ttp_porcentaje' => $this->ttp_porcentaje,
                'valoracion_22' => $this->valoracion_22,
            ]);
        } else {
            ResIndicador22::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'n' => $this->n,
                'nept_1' => $this->nept_1,
                'tec_1' => $this->tec_1,
                'nept_2' => $this->nept_2,
                'tec_2' => $this->tec_2,
                'nept_3' => $this->nept_3,
                'tec_3' => $this->tec_3,
                'nept_4' => $this->nept_4,
                'tec_4' => $this->tec_4,
                'nept_5' => $this->nept_5,
                'tec_5' => $this->tec_5,
                'nept_6' => $this->nept_6,
                'tec_6' => $this->tec_6,
                'ttp' => $this->ttp,
                'ttp_porcentaje' => $this->ttp_porcentaje,
                'valoracion_22' => $this->valoracion_22,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
