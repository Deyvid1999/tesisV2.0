<?php

namespace App\Http\Livewire\Criterio4;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador25;
use Livewire\Component;

class Indicador25 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $tp, $tpyrf, $tpyci, $tpycn, $ip, $ip_porcentaje, $valoracion_25;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_25 = ResIndicador25::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->tp = isset($res_indicador_25->tp) ? $res_indicador_25->tp : '1';
        $this->tpyrf = isset($res_indicador_25->tpyrf) ? $res_indicador_25->tpyrf : '1';
        $this->tpyci = isset($res_indicador_25->tpyci) ? $res_indicador_25->tpyci : '1';
        $this->tpycn = isset($res_indicador_25->tpycn) ? $res_indicador_25->tpycn : '1';
        $this->ip = isset($res_indicador_25->ip) ? $res_indicador_25->ip : '30';
        $this->ip_porcentaje = isset($res_indicador_25->ip_porcentaje) ? $res_indicador_25->ip_porcentaje : round($this->indicador->porcentaje * 0.75, 3);
        $this->valoracion_25 = isset($res_indicador_25->valoracion_25) ? $res_indicador_25->valoracion_25 : 'CUASI SATISFACTORIO';
    }

    public function updatedTp()
    {
        $this->calculo();
    }

    public function updatedTpyrf()
    {
        $this->calculo();
    }

    public function updatedTpyci()
    {
        $this->calculo();
    }

    public function updatedTpycn()
    {
        $this->calculo();
    }

    public function calculo()
    {
        try {
            $this->ip = round(((floatval($this->tpyrf) + floatval($this->tpyci) + floatval($this->tpycn)) / floatval($this->tp)) * 100, 2);
            if ($this->ip >= 40) {
                $this->valoracion_25 = 'SATISFACTORIO';
                $this->ip_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->ip >= 26 && $this->ip < 40) {
                $this->valoracion_25 = 'CUASI SATISFACTORIO';
                $this->ip_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->ip >= 13 && $this->ip < 26) {
                $this->valoracion_25 = 'POCO SATISFACTORIO';
                $this->ip_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->ip < 13) {
                $this->valoracion_25 = 'DEFICIENTE';
                $this->ip_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->ip = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio4.indicador25.view');
    }

    public function guardarIndicador25()
    {
        $res_indicador_25 = ResIndicador25::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_25) {
            $res_indicador_25->update([
                'tp' => $this->tp,
                'tpyrf' => $this->tpyrf,
                'tpyci' => $this->tpyci,
                'tpycn' => $this->tpycn,
                'ip' => $this->ip,
                'ip_porcentaje' => $this->ip_porcentaje,
                'valoracion_25' => $this->valoracion_25,
            ]);
        } else {
            ResIndicador25::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'tp' => $this->tp,
                'tpyrf' => $this->tpyrf,
                'tpyci' => $this->tpyci,
                'tpycn' => $this->tpycn,
                'ip' => $this->ip,
                'ip_porcentaje' => $this->ip_porcentaje,
                'valoracion_25' => $this->valoracion_25,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
