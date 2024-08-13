<?php

namespace App\Http\Livewire\Criterio5;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador29;
use Livewire\Component;

class Indicador29 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $tpv, $toa, $ipv, $ipv_porcentaje, $valoracion_29;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_29 = ResIndicador29::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->tpv = isset($res_indicador_29->tpv) ? $res_indicador_29->tpv : '1';
        $this->toa = isset($res_indicador_29->toa) ? $res_indicador_29->toa : '1';
        $this->ipv = isset($res_indicador_29->ipv) ? $res_indicador_29->ipv : '1';
        $this->ipv_porcentaje = isset($res_indicador_29->ipv_porcentaje) ? $res_indicador_29->ipv_porcentaje : round($this->indicador->porcentaje * 0.75, 3);
        $this->valoracion_29 = isset($res_indicador_29->valoracion) ? $res_indicador_29->valoracion : 'CUASI SATISFACTORIO';
    }

    public function updatedTpv()
    {
        $this->calculo();
    }

    public function updatedToa()
    {
        $this->calculo();
    }

    public function calculo()
    {
        try {
            $this->ipv = round(floatval($this->tpv) / floatval($this->toa), 3);
            $this->ipv = round(floatval($this->tpv) / floatval($this->toa), 3);
            if ($this->ipv >= 1.5) {
                $this->valoracion_29 = 'SATISFACTORIO';
                $this->ipv_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->ipv >= 1 && $this->ipv < 1.5) {
                $this->valoracion_29 = 'CUASI SATISFACTORIO';
                $this->ipv_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->ipv >= 0.5 && $this->ipv < 1) {
                $this->valoracion_29 = 'POCO SATISFACTORIO';
                $this->ipv_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->ipv < 0.5) {
                $this->valoracion_29 = 'DEFICIENTE';
                $this->ipv_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->ipv = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio5.indicador29.view');
    }

    public function guardarIndicador29()
    {
        $res_indicador_29 = ResIndicador29::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_29) {
            $res_indicador_29->update([
                'tpv' => $this->tpv,
                'toa' => $this->toa,
                'ipv' => $this->ipv,
                'ipv_porcentaje' => $this->ipv_porcentaje,
                'valoracion_29' => $this->valoracion_29,
            ]);
        } else {
            ResIndicador29::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'tpv' => $this->tpv,
                'toa' => $this->toa,
                'ipv' => $this->ipv,
                'ipv_porcentaje' => $this->ipv_porcentaje,
                'valoracion_29' => $this->valoracion_29,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
