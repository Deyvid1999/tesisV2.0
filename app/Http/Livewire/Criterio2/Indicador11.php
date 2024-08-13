<?php

namespace App\Http\Livewire\Criterio2;

use App\Models\ElementoFundamental;
use App\Models\EscalaDocente;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\ResDocente;
use Livewire\Component;

class Indicador11 extends Component
{
    public $indicador, $subcriterio, $criterio, $escalas, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id;
    public $porcentaje = [];
    public $valoracion = [];
    public $observacion = [];
    public $prueba;
    public $elementosFundamentales;    

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);        
        $this->criterio_id = $this->indicador->criterio->id;
        $this->escalas = EscalaDocente::all();

        $this->elementosFundamentales = ElementoFundamental::where('indicador_id', $this->indicador_id)->get();

        foreach ($this->elementosFundamentales as $elemento) {
            $res_docente = ResDocente::where('elemento_fundamental_id', $elemento->id)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
            $this->porcentaje[$elemento->id] = isset($res_docente->porcentaje) ? $res_docente->porcentaje : '0.00';
            $this->valoracion[$elemento->id] = isset($res_docente->valoracion) ? $res_docente->valoracion : null;
            $this->observacion[$elemento->id] = isset($res_docente->observacion) ? $res_docente->observacion : null;
        }
    }

    public function updated($propertyName)
    {
        foreach ($this->valoracion as $key => $value) {
            $porcentaje_key = ElementoFundamental::where('id', $key)->where('indicador_id', $this->indicador_id)->pluck('porcentaje')->first();
            if (strpos($propertyName, 'valoracion.' . $key) === 0) {
                $this->porcentaje[$key] = round($value * $porcentaje_key / 100, 3);
            }
        }
    }


    public function render()
    {
        return view('livewire.criterio2.indicador11.view');
    }

    public function guardarIndicador11()
    {
        $datos = [];
        foreach ($this->valoracion as $key => $value) {
            if ($key != 0) {
                $datos[$key]['valoracion'] = $value;
                $datos[$key]['porcentaje'] = $this->porcentaje[$key];
                if (!isset($this->observacion[$key])) {
                    $datos[$key]['observacion'] = null;
                } else {
                    $datos[$key]['observacion'] = $this->observacion[$key];
                }
                $datos[$key]['user_id'] = auth()->user()->id;
                $datos[$key]['universidad_id'] = $this->universidad_id;
                $datos[$key]['evaluacion_id'] = $this->evaluacion_id;
                $datos[$key]['criterio_id'] = $this->criterio_id;
                // $datos[$key]['subcriterio_id'] = $this->subcriterio_id;
                $datos[$key]['indicador_id'] = $this->indicador_id;
                $datos[$key]['elemento_fundamental_id'] = $key;
            }
        }
        foreach ($datos as $key => $item) {
            $id = ResDocente::where('elemento_fundamental_id', $key)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->get()->first();
            if ($id != null) {
                //update
                ResDocente::where('elemento_fundamental_id', $key)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->update($item);
            } else {
                //insert
                ResDocente::insert($item);
            }
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }

}
