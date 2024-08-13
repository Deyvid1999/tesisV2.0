<?php

namespace App\Http\Livewire\Criterio3;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador17;
use Livewire\Component;

class Indicador17 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $ptc, $tp, $tptc, $tptc_porcentaje, $valoracion_17;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_17 = ResIndicador17::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->ptc = isset($res_indicador_17->ptc) ? $res_indicador_17->ptc : '1';
        $this->tp = isset($res_indicador_17->tp) ? $res_indicador_17->tp : '1';
        $this->tptc = isset($res_indicador_17->tptc) ? $res_indicador_17->tptc : '100';
        $this->tptc_porcentaje = isset($res_indicador_17->tptc_porcentaje) ? $res_indicador_17->tptc_porcentaje : round($this->indicador->porcentaje * 1, 3);
        $this->valoracion_17 = isset($res_indicador_17->valoracion) ? $res_indicador_17->valoracion : 'SATISFACTORIO';
    }

    public function updatedPtc()
    {
        $this->calculo();
    }

    public function updatedTp()
    {
        $this->calculo();
    }

    public function calculo()
    {
        try {
            $this->tptc = round((floatval($this->ptc) / floatval($this->tp)) * 100, 3);
            if ($this->tptc >= 50) {
                $this->valoracion_17 = 'SATISFACTORIO';
                $this->tptc_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->tptc < 50) {
                $this->valoracion_17 = 'DEFICIENTE';
                $this->tptc_porcentaje = round($this->indicador->porcentaje * 0, 3);
            }
        } catch (\Throwable $th) {
            $this->tptc = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio3.indicador17.view');
    }

    public function guardarIndicador17()
    {
        $res_indicador_17 = ResIndicador17::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_17) {
            $res_indicador_17->update([
                'ptc' => $this->ptc,
                'tp' => $this->tp,
                'tptc' => $this->tptc,
                'tptc_porcentaje' => $this->tptc_porcentaje,
                'valoracion_17' => $this->valoracion_17,
            ]);
        } else {
            ResIndicador17::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'ptc' => $this->ptc,
                'tp' => $this->tp,
                'tptc' => $this->tptc,
                'tptc_porcentaje' => $this->tptc_porcentaje,
                'valoracion_17' => $this->valoracion_17,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
