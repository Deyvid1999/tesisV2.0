<?php

namespace App\Http\Livewire\Criterio3;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador19;
use Livewire\Component;

class Indicador19 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $n, $neg_a1_2, $neg_a1, $neg_a2_2, $neg_a2, $neg_a3_2, $neg_a3, $neg_a4_2, $neg_a4, $neg_a5_2, $neg_a5, $neg_a6_2, $neg_a6,
        $tdg2, $tdg2_porcentaje, $valoracion_19;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_19 = ResIndicador19::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->n = isset($res_indicador_19->n) ? $res_indicador_19->n : '1';
        $this->neg_a1_2 = isset($res_indicador_19->neg_a1_2) ? $res_indicador_19->neg_a1_2 : '0';
        $this->neg_a1 = isset($res_indicador_19->neg_a1) ? $res_indicador_19->neg_a1 : '1';
        $this->neg_a2_2 = isset($res_indicador_19->neg_a2_2) ? $res_indicador_19->neg_a2_2 : '0';
        $this->neg_a2 = isset($res_indicador_19->neg_a2) ? $res_indicador_19->neg_a2 : '1';
        $this->neg_a3_2 = isset($res_indicador_19->neg_a3_2) ? $res_indicador_19->neg_a3_2 : '0';
        $this->neg_a3 = isset($res_indicador_19->neg_a3) ? $res_indicador_19->neg_a3 : '1';
        $this->neg_a4_2 = isset($res_indicador_19->neg_a4_2) ? $res_indicador_19->neg_a4_2 : '0';
        $this->neg_a4 = isset($res_indicador_19->neg_a4) ? $res_indicador_19->neg_a4 : '1';
        $this->neg_a5_2 = isset($res_indicador_19->neg_a5_2) ? $res_indicador_19->neg_a5_2 : '0';
        $this->neg_a5 = isset($res_indicador_19->neg_a5) ? $res_indicador_19->neg_a5 : '1';
        $this->neg_a6_2 = isset($res_indicador_19->neg_a6_2) ? $res_indicador_19->neg_a6_2 : '0';
        $this->neg_a6 = isset($res_indicador_19->neg_a6) ? $res_indicador_19->neg_a6 : '1';
        $this->tdg2 = isset($res_indicador_19->tdg2) ? $res_indicador_19->tdg2 : '0';
        $this->tdg2_porcentaje = isset($res_indicador_19->tdg2_porcentaje) ? $res_indicador_19->tdg2_porcentaje : round($this->indicador->porcentaje * 1, 3);
        $this->valoracion_19 = isset($res_indicador_19->valoracion_19) ? $res_indicador_19->valoracion_19 : 'SATISFACTORIO';
    }

    public function updatedN()
    {
        $this->calculo();
    }

    public function updatedNegA12()
    {
        $this->calculo();
    }

    public function updatedNegA1()
    {
        $this->calculo();
    }

    public function updatedNegA22()
    {
        $this->calculo();
    }

    public function updatedNegA2()
    {
        $this->calculo();
    }

    public function updatedNegA32()
    {
        $this->calculo();
    }

    public function updatedNegA3()
    {
        $this->calculo();
    }

    public function updatedNegA42()
    {
        $this->calculo();
    }

    public function updatedNegA4()
    {
        $this->calculo();
    }

    public function updatedNegA52()
    {
        $this->calculo();
    }

    public function updatedNegA5()
    {
        $this->calculo();
    }

    public function updatedNegA62()
    {
        $this->calculo();
    }

    public function updatedNegA6()
    {
        $this->calculo();
    }


    public function calculo()
    {
        try {
            if ($this->n == 1) {
                $this->tdg2 = round((1 / floatval($this->n)) * (floatval($this->neg_a1_2) / floatval($this->neg_a1)) * 100, 3);
            } elseif ($this->n == 2) {
                $this->tdg2 = round((1 / floatval($this->n)) * ((floatval($this->neg_a1_2) / floatval($this->neg_a1)) + (floatval($this->neg_a2_2) / floatval($this->neg_a2))) * 100, 3);
            } elseif ($this->n == 3) {
                $this->tdg2 = round((1 / floatval($this->n)) * ((floatval($this->neg_a1_2) / floatval($this->neg_a1)) + (floatval($this->neg_a2_2) / floatval($this->neg_a2)) + (floatval($this->neg_a3_2) / floatval($this->neg_a3))) * 100, 3);
            } elseif ($this->n == 4) {
                $this->tdg2 = round((1 / floatval($this->n)) * ((floatval($this->neg_a1_2) / floatval($this->neg_a1)) + (floatval($this->neg_a2_2) / floatval($this->neg_a2)) + (floatval($this->neg_a3_2) / floatval($this->neg_a3)) + (floatval($this->neg_a4_2) / floatval($this->neg_a4))) * 100, 3);
            } elseif ($this->n == 5) {
                $this->tdg2 = round((1 / floatval($this->n)) * ((floatval($this->neg_a1_2) / floatval($this->neg_a1)) + (floatval($this->neg_a2_2) / floatval($this->neg_a2)) + (floatval($this->neg_a3_2) / floatval($this->neg_a3)) + (floatval($this->neg_a4_2) / floatval($this->neg_a4)) + (floatval($this->neg_a5_2) / floatval($this->neg_a5))) * 100, 3);
            } elseif ($this->n == 6) {
                $this->tdg2 = round((1 / floatval($this->n)) * ((floatval($this->neg_a1_2) / floatval($this->neg_a1)) + (floatval($this->neg_a2_2) / floatval($this->neg_a2)) + (floatval($this->neg_a3_2) / floatval($this->neg_a3)) + (floatval($this->neg_a4_2) / floatval($this->neg_a4)) + (floatval($this->neg_a5_2) / floatval($this->neg_a5)) + (floatval($this->neg_a6_2) / floatval($this->neg_a6))) * 100, 3);
            }

            if ($this->tdg2 <= 14) {
                $this->valoracion_19 = 'SATISFACTORIO';
                $this->tdg2_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->tdg2 > 14 && $this->tdg2 <= 18) {
                $this->valoracion_19 = 'CUASI SATISFACTORIO';
                $this->tdg2_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->tdg2 > 18 && $this->tdg2 <= 23) {
                $this->valoracion_19 = 'POCO SATISFACTORIO';
                $this->tdg2_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->tdg2 > 23) {
                $this->valoracion_19 = 'DEFICIENTE';
                $this->tdg2_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->tdg2 = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio3.indicador19.view');
    }

    public function guardarIndicador19()
    {
        $res_indicador_19 = ResIndicador19::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_19) {
            $res_indicador_19->update([
                'n' => $this->n,
                'neg_a1_2' => $this->neg_a1_2,
                'neg_a1' => $this->neg_a1,
                'neg_a2_2' => $this->neg_a2_2,
                'neg_a2' => $this->neg_a2,
                'neg_a3_2' => $this->neg_a3_2,
                'neg_a3' => $this->neg_a3,
                'neg_a4_2' => $this->neg_a4_2,
                'neg_a4' => $this->neg_a4,
                'neg_a5_2' => $this->neg_a5_2,
                'neg_a5' => $this->neg_a5,
                'neg_a6_2' => $this->neg_a6_2,
                'neg_a6' => $this->neg_a6,
                'tdg2' => $this->tdg2,
                'tdg2_porcentaje' => $this->tdg2_porcentaje,
                'valoracion_19' => $this->valoracion_19,
            ]);
        } else {
            ResIndicador19::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'n' => $this->n,
                'neg_a1_2' => $this->neg_a1_2,
                'neg_a1' => $this->neg_a1,
                'neg_a2_2' => $this->neg_a2_2,
                'neg_a2' => $this->neg_a2,
                'neg_a3_2' => $this->neg_a3_2,
                'neg_a3' => $this->neg_a3,
                'neg_a4_2' => $this->neg_a4_2,
                'neg_a4' => $this->neg_a4,
                'neg_a5_2' => $this->neg_a5_2,
                'neg_a5' => $this->neg_a5,
                'neg_a6_2' => $this->neg_a6_2,
                'neg_a6' => $this->neg_a6,
                'tdg2' => $this->tdg2,
                'tdg2_porcentaje' => $this->tdg2_porcentaje,
                'valoracion_19' => $this->valoracion_19,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
