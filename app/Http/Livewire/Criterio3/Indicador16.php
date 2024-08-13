<?php

namespace App\Http\Livewire\Criterio3;

use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResIndicador16;
use Livewire\Component;

class Indicador16 extends Component
{
    public $indicador, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;

    public $tphd, $tp, $tpafd, $tpafd_porcentaje, $valoracion_16;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        $this->criterio_id = $this->indicador->criterio->id;

        $res_indicador_16 = ResIndicador16::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        $this->tphd = isset($res_indicador_16->tphd) ? $res_indicador_16->tphd : '1';
        $this->tp = isset($res_indicador_16->tp) ? $res_indicador_16->tp : '1';
        $this->tpafd = isset($res_indicador_16->tpafd) ? $res_indicador_16->tpafd : '100';
        $this->tpafd_porcentaje = isset($res_indicador_16->tpafd_porcentaje) ? $res_indicador_16->tpafd_porcentaje : round($this->indicador->porcentaje * 1, 3);
        $this->valoracion_16 = isset($res_indicador_16->valoracion) ? $res_indicador_16->valoracion : 'SATISFACTORIO';
    }

    public function updatedTphd()
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
            $this->tpafd = round((floatval($this->tphd) / floatval($this->tp)) * 100, 3);
            if ($this->tpafd >= 20) {
                $this->valoracion_16 = 'SATISFACTORIO';
                $this->tpafd_porcentaje = round($this->indicador->porcentaje * 1, 3);
            } elseif ($this->tpafd >= 13 && $this->tpafd < 20) {
                $this->valoracion_16 = 'CUASI SATISFACTORIO';
                $this->tpafd_porcentaje = round($this->indicador->porcentaje * 0.75, 3);
            } elseif ($this->tpafd >= 7 && $this->tpafd < 13) {
                $this->valoracion_16 = 'POCO SATISFACTORIO';
                $this->tpafd_porcentaje = round($this->indicador->porcentaje * 0.5, 3);
            } elseif ($this->tpafd < 7) {
                $this->valoracion_16 = 'DEFICIENTE';
                $this->tpafd_porcentaje = round($this->indicador->porcentaje * 0.25, 3);
            }
        } catch (\Throwable $th) {
            $this->tpafd = 0;
        }
    }

    public function render()
    {
        return view('livewire.criterio3.indicador16.view');
    }

    public function guardarIndicador16()
    {
        $res_indicador_16 = ResIndicador16::where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
        if ($res_indicador_16) {
            $res_indicador_16->update([
                'tphd' => $this->tphd,
                'tp' => $this->tp,
                'tpafd' => $this->tpafd,
                'tpafd_porcentaje' => $this->tpafd_porcentaje,
                'valoracion_16' => $this->valoracion_16,
            ]);
        } else {
            ResIndicador16::create([
                'universidad_id' => $this->universidad_id,
                'evaluacion_id' => $this->evaluacion_id,
                'criterio_id' => $this->criterio_id,
                'indicador_id' => $this->indicador_id,
                'tphd' => $this->tphd,
                'tp' => $this->tp,
                'tpafd' => $this->tpafd,
                'tpafd_porcentaje' => $this->tpafd_porcentaje,
                'valoracion_16' => $this->valoracion_16,
                'user_id' => auth()->user()->id,
            ]);
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }
}
