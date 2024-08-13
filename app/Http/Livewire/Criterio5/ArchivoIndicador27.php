<?php

namespace App\Http\Livewire\Criterio5;

use App\Models\ArchVinculacion;
use App\Models\Evaluacion;
use App\Models\FuenteInformacion;
use App\Models\Indicador;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArchivoIndicador27 extends Component
{
    use WithFileUploads;
    public $indicador, $subcriterio, $criterio, $escalas, $evaluacion, $universidad_id;
    public $indicador_id, $subcriterio_id, $criterio_id, $evaluacion_id, $archivo_url = [];
    public $archivo = [];
    public $observacion = [];
    public $fuentesInformaciones;

    public function mount($id_indicador, $id_evaluacion)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        // $this->subcriterio_id = $this->indicador->subcriterio->id;        
        $this->criterio_id = $this->indicador->criterio->id;

        $this->fuentesInformaciones = FuenteInformacion::where('indicador_id', $this->indicador_id)->get();
        foreach ($this->fuentesInformaciones as $fuente) {
            $arch_vinculacion = ArchVinculacion::where('fuente_informacion_id', $fuente->id)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
            $this->archivo_url[$fuente->id] = isset($arch_vinculacion->archivo) ? $arch_vinculacion->archivo : null;
            $this->archivo[$fuente->id] = null;
            $this->observacion[$fuente->id] = isset($arch_vinculacion->observacion) ? $arch_vinculacion->observacion : null;
        }
    }

    public function render()
    {
        return view('livewire.criterio5.archivo-indicador27.view');
    }

    public function guardarArchivoIndicador27()
    {
        $rutaArchivos = 'uploads/' . $this->evaluacion->universidad->universidad . '/' . $this->evaluacion->fecha_creacion .'-'.$this->evaluacion->id . '/criterio-' . $this->indicador->criterio->id . '/indicador-' . $this->indicador_id . '/';
        $datos = [];
        foreach ($this->archivo as $key => $archivo) {
            if ($key != 0) {                
                if ($archivo == null) {
                    $arch_vinculacion = ArchVinculacion::where('fuente_informacion_id', $key)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->first();
                    if(isset($arch_vinculacion->archivo)){
                        $nombre_archivo = $arch_vinculacion->archivo;
                    } else{
                        $nombre_archivo = null;
                    }
                } else {
                    $nombre_archivo_1 = $archivo->getClientOriginalName();
                    $nombre_archivo = $archivo->storeAs($rutaArchivos, $nombre_archivo_1, 'public');
                }
                $datos[$key]['archivo'] = $nombre_archivo;
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
                $datos[$key]['fuente_informacion_id'] = $key;
            }
        }
        foreach ($datos as $key => $item) {
            $id = ArchVinculacion::where('fuente_informacion_id', $key)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->get()->first();
            if ($id != null) {
                //update
                ArchVinculacion::where('fuente_informacion_id', $key)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->update($item);
            } else {
                //insert
                ArchVinculacion::insert($item);
            }
        }
        session()->flash('success', 'Registro agregado con éxito.');
    }

}
