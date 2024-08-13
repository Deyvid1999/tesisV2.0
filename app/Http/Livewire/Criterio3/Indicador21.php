<?php

namespace App\Http\Livewire\Criterio3;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador21;
use Livewire\Component;

class Indicador21 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $n, $negt_1, $teg_1, $negt_2, $teg_2, $negt_3, $teg_3, $negt_4, $teg_4, $negt_5, $teg_5, $negt_6, $teg_6,
        $ttg, $ttg_porcentaje, $valoracion_21;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_21 = ResIndicador21::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->n = isset($res_indicador_21->n) ? $res_indicador_21->n : '1';
        $this->negt_1 = isset($res_indicador_21->negt_1) ? $res_indicador_21->negt_1 : '0';
        $this->teg_1 = isset($res_indicador_21->teg_1) ? $res_indicador_21->teg_1 : '1';
        $this->negt_2 = isset($res_indicador_21->negt_2) ? $res_indicador_21->negt_2 : '0';
        $this->teg_2 = isset($res_indicador_21->teg_2) ? $res_indicador_21->teg_2 : '1';
        $this->negt_3 = isset($res_indicador_21->negt_3) ? $res_indicador_21->negt_3 : '0';
        $this->teg_3 = isset($res_indicador_21->teg_3) ? $res_indicador_21->teg_3 : '1';
        $this->negt_4 = isset($res_indicador_21->negt_4) ? $res_indicador_21->negt_4 : '0';
        $this->teg_4 = isset($res_indicador_21->teg_4) ? $res_indicador_21->teg_4 : '1';
        $this->negt_5 = isset($res_indicador_21->negt_5) ? $res_indicador_21->negt_5 : '0';
        $this->teg_5 = isset($res_indicador_21->teg_5) ? $res_indicador_21->teg_5 : '1';
        $this->negt_6 = isset($res_indicador_21->negt_6) ? $res_indicador_21->negt_6 : '0';
        $this->teg_6 = isset($res_indicador_21->teg_6) ? $res_indicador_21->teg_6 : '1';
        $this->ttg = isset($res_indicador_21->ttg) ? $res_indicador_21->ttg : '0';
        $this->ttg_porcentaje = isset($res_indicador_21->ttg_porcentaje) ? $res_indicador_21->ttg_porcentaje : round($this->indicador->porcentaje * 0.25, 3);
        $this->valoracion_21 = isset($res_indicador_21->valoracion_21) ? $res_indicador_21->valoracion_21 : 'DEFICIENTE';
    }

    public function updatedN()
    {
        $this->calculo();
    }

    public function updatedNegt1()
    {
        $this->calculo();
    }

    public function updatedTeg1()
    {
        $this->calculo();
    }

    public function updatedNegt2()
    {
        $this->calculo();
    }

    public function updatedTeg2()
    {
        $this->calculo();
    }

    public function updatedNegt3()
    {
        $this->calculo();
    }

    public function updatedTeg3()
    {
        $this->calculo();
    }

    public function updatedNegt4()
    {
        $this->calculo();
    }

    public function updatedTeg4()
    {
        $this->calculo();
    }

    public function updatedNegt5()
    {
        $this->calculo();
    }

    public function updatedTeg5()
    {
        $this->calculo();
    }

    public function updatedNegt6()
    {
        $this->calculo();
    }

    public function updatedTeg6()
    {
        $this->calculo();
    }


    public function calculo()
    {
        try {
            if ($this->n == 1) {
                $this->ttg = round((1 / floatval($this->n)) * (floatval($this->negt_1) / floatval($this->teg_1)) * 100, 3);
            } elseif ($this->n == 2) {
                $this->ttg = round((1 / floatval($this->n)) * ((floatval($this->negt_1) / floatval($this->teg_1)) + (floatval($this->negt_2) / floatval($this->teg_2))) * 100, 3);
            } elseif ($this->n == 3) {
                $this->ttg = round((1 / floatval($this->n)) * ((floatval($this->negt_1) / floatval($this->teg_1)) + (floatval($this->negt_2) / floatval($this->teg_2)) + (floatval($this->negt_3) / floatval($this->teg_3))) * 100, 3);
            } elseif ($this->n == 4) {
                $this->ttg = round((1 / floatval($this->n)) * ((floatval($this->negt_1) / floatval($this->teg_1)) + (floatval($this->negt_2) / floatval($this->teg_2)) + (floatval($this->negt_3) / floatval($this->teg_3)) + (floatval($this->negt_4) / floatval($this->teg_4))) * 100, 3);
            } elseif ($this->n == 5) {
                $this->ttg = round((1 / floatval($this->n)) * ((floatval($this->negt_1) / floatval($this->teg_1)) + (floatval($this->negt_2) / floatval($this->teg_2)) + (floatval($this->negt_3) / floatval($this->teg_3)) + (floatval($this->negt_4) / floatval($this->teg_4)) + (floatval($this->negt_5) / floatval($this->teg_5))) * 100, 3);
            } elseif ($this->n == 6) {
                $this->ttg = round((1 / floatval($this->n)) * ((floatval($this->negt_1) / floatval($this->teg_1)) + (floatval($this->negt_2) / floatval($this->teg_2)) + (floatval($this->negt_3) / floatval($this->teg_3)) + (floatval($this->negt_4) / floatval($this->teg_4)) + (floatval($this->negt_5) / floatval($this->teg_5)) + (floatval($this->negt_6) / floatval($this->teg_6))) * 100, 3);
            }

            if ($this->ttg >= 50) {
                $this->valoracion_21 = 'SATISFACTORIO';
                $this->ttg_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->ttg >= 33 && $this->ttg < 50) {
                $this->valoracion_21 = 'CUASI SATISFACTORIO';
                $this->ttg_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->ttg >= 16 && $this->ttg < 33) {
                $this->valoracion_21 = 'POCO SATISFACTORIO';
                $this->ttg_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->ttg < 16) {
                $this->valoracion_21 = 'DEFICIENTE';
                $this->ttg_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->ttg = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio3.indicador21.view');
    }

    public function guardarIndicador21()
    {
        $res_indicador_21 = ResIndicador21::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_21) {
            $res_indicador_21->update([
                'n' => $this->n,
                'negt_1' => $this->negt_1,
                'teg_1' => $this->teg_1,
                'negt_2' => $this->negt_2,
                'teg_2' => $this->teg_2,
                'negt_3' => $this->negt_3,
                'teg_3' => $this->teg_3,
                'negt_4' => $this->negt_4,
                'teg_4' => $this->teg_4,
                'negt_5' => $this->negt_5,
                'teg_5' => $this->teg_5,
                'negt_6' => $this->negt_6,
                'teg_6' => $this->teg_6,
                'ttg' => $this->ttg,
                'ttg_porcentaje' => $this->ttg_porcentaje,
                'valoracion_21' => $this->valoracion_21,
            ]);
        } else {
            ResIndicador21::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'n' => $this->n,
                'negt_1' => $this->negt_1,
                'teg_1' => $this->teg_1,
                'negt_2' => $this->negt_2,
                'teg_2' => $this->teg_2,
                'negt_3' => $this->negt_3,
                'teg_3' => $this->teg_3,
                'negt_4' => $this->negt_4,
                'teg_4' => $this->teg_4,
                'negt_5' => $this->negt_5,
                'teg_5' => $this->teg_5,
                'negt_6' => $this->negt_6,
                'teg_6' => $this->teg_6,
                'ttg' => $this->ttg,
                'ttg_porcentaje' => $this->ttg_porcentaje,
                'valoracion_21' => $this->valoracion_21,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
