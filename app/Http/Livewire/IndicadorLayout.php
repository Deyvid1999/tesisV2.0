<?php

namespace App\Http\Livewire;

use App\Models\ElementoFundamental;
use App\Models\Escala;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\Resultado;
use Livewire\Component;

class IndicadorLayout extends Component
{
    public $indicador, $subcriterio, $criterio, $escalas, $evaluacion, $uni_id;
    public $ind_id, $sub_id, $cri_id, $eva_id;
    public $porcentaje = [];
    public $valoracion = [];
    public $observacion = [];
    public $prueba;
    public $elementosFundamentales;    

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->eva_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->eva_id);
        $this->uni_id = $this->evaluacion->universidad->id;
        $this->ind_id = $id_indicador;
        $this->indicador = Indicador::find($this->ind_id);
        $this->sub_id = $this->indicador->sub_id;
        $this->cri_id = $this->indicador->cri_id;
        $this->escalas = Escala::all();

        $this->elementosFundamentales = ElementoFundamental::where('ind_id', $this->ind_id)->get();

        foreach ($this->elementosFundamentales as $elemento) {
            $resultado = Resultado::where('ele_id', $elemento->id)->where('eva_id', $this->eva_id)->first();
            $this->porcentaje[$elemento->id] = isset($resultado->resultado) ? $resultado->resultado : 0;
            $this->valoracion[$elemento->id] = isset($resultado->esc_id) ? $resultado->escala->porcentaje : null;
            $this->observacion[$elemento->id] = isset($resultado->observacion) ? $resultado->observacion : null;
        }
    }

    public function updated($propertyName)
    {
        foreach ($this->valoracion as $key => $value) {
            $porcentaje_key = ElementoFundamental::where('id', $key)->where('ind_id', $this->ind_id)->pluck('porcentaje')->first();
            $this->porcentaje[$key] = round($value * $porcentaje_key / 100, 3);
        }
    }

    public function render()
    {
        return view('livewire.elementos-layout');
    }

    public function guardarIndicador()
    {
        $datos = [];
        try {
            foreach ($this->porcentaje as $key => $value) {
                if ($key != 0) {
                    $datos[$key]['resultado'] = $this->porcentaje[$key];
                    if (!isset($this->observacion[$key])) {
                        $datos[$key]['observacion'] = null;
                    } else {
                        $datos[$key]['observacion'] = $this->observacion[$key];
                    }
                    $datos[$key]['eva_use_id'] = auth()->user()->id;
                    $datos[$key]['eva_uni_id'] = $this->uni_id;
                    $datos[$key]['eva_id'] = $this->eva_id;
                        $datos[$key]['esc_id'] = Escala::where('porcentaje',$this->valoracion[$key])->first()->id;
    
                    $datos[$key]['ele_ind_id'] = $this->ind_id;
                    $datos[$key]['ele_id'] = $key;
                    $datos[$key]['estatus']=1;
                }
            }
            foreach ($datos as $key => $item) {
                $id = Resultado::where('ele_id', $key)->where('eva_id', $this->eva_id)->where('ele_ind_id', $this->ind_id)->get()->first();
                if ($id != null) {
                    //update
                    Resultado::where('ele_id', $key)->where('eva_id', $this->eva_id)->where('ele_ind_id', $this->ind_id)->update($item);
                } else {
                    //insert
                    Resultado::insert($item);
                }
            }
            session()->flash('success', 'Registro agregado con éxito.');     
        } catch (\Throwable $th) {
            session()->flash('error', 'Verifique los valores.');     
        }
    }
}
