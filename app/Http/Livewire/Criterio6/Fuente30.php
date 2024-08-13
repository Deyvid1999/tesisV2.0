<?php

namespace App\Http\Livewire\Criterio6;

use App\Models\ArchGestionCalidad;
use App\Models\Evaluacion;
use App\Models\Indicador;
use Livewire\Component;
use Livewire\WithFileUploads;

class Fuente30 extends Component
{
    use WithFileUploads;
    public $indicador, $subcriterio, $criterio, $evaluacion, $universidad_id;
    public $indicador_id, $criterio_id, $evaluacion_id, $fuente_id, $old_archivo, $id_arch_programa;
    public $archivo, $observacion, $delete_id;
    public $nombre_indicador, $nombre_criterio;

    protected $rules = [
        'archivo' => 'required|file|max:5120',
        'observacion' => 'required',
    ];

    protected $messages = [
        'archivo.required' => 'El campo Archivo es requerido.',
        'archivo.file' => 'El campo Archivo debe ser un archivo.',
        'archivo.max' => 'El campo Archivo no debe ser mayor a 5MB.',
        'observacion.required' => 'El campo Observación es requerido.',
    ];

    public function mount($id_indicador, $id_evaluacion, $id_fuente)
    {
        $this->evaluacion_id = $id_evaluacion;
        $this->evaluacion = Evaluacion::find($this->evaluacion_id);
        $this->universidad_id = $this->evaluacion->universidad->id;
        $this->indicador_id = $id_indicador;
        $this->indicador = Indicador::find($this->indicador_id);
        // DIVIDIENDO LA CADENA EN PARTES
        $parts_nombre_inidcador = explode(':', $this->indicador->indicador);
        $this->nombre_indicador = trim($parts_nombre_inidcador[1]);
        // FIN        
        $this->criterio_id = $this->indicador->criterio->id;
        $this->nombre_criterio = $this->indicador->criterio->criterio;        
        $this->fuente_id = $id_fuente;
    }

    public function render()
    {
        $arch_calidades = ArchGestionCalidad::where('fuente_informacion_id', $this->fuente_id)->where('evaluacion_id', $this->evaluacion_id)->where('indicador_id', $this->indicador_id)->get();
        return view('livewire.criterio6.fuente30.view', compact('arch_calidades'));
    }

    // LIMPIAR LOS CAMPOS AL CANCELAR O CERRAR FORMULARIO
    public function cancel()
    {
        $this->resetInput();
    }
    // LIMPIAR LOS CAMPOS
    public function resetInput()
    {
        $this->archivo = null;
        $this->observacion = null;
    }

    // FUNCION PARA GUARDAR DATOS
    public function store()
    {
        $this->validate();
        $rutaArchivos = 'uploads/' . $this->evaluacion->universidad->universidad . '/' . $this->evaluacion->fecha_creacion . '/' . $this->nombre_criterio . '/' . $this->nombre_indicador . '/FUENTE ' . $this->fuente_id . '/';
        $nombre_archivo_1 = $this->archivo->getClientOriginalName();
        if ($this->archivo != null) {
            $nombre_archivo = $this->archivo->storeAs($rutaArchivos, $nombre_archivo_1, 'public');
        } else {
            $nombre_archivo = $this->archivo;
        }
        ArchGestionCalidad::create([
            'universidad_id' => $this->universidad_id,
            'evaluacion_id' => $this->evaluacion_id,
            'criterio_id' => $this->criterio_id,            
            'indicador_id' => $this->indicador_id,
            'fuente_informacion_id' => $this->fuente_id,
            'archivo' => $nombre_archivo,
            'observacion' => $this->observacion,
            'user_id' => auth()->user()->id,
        ]);

        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'Registro agregado con éxito');
    }

    // FUNCION PARA ACTUALIZAR LOS DATOS DEL ESTUDIANTE
    public function edit($id)
    {
        $dato = ArchGestionCalidad::findOrFail($id);
        $this->id_arch_programa = $dato->id;
        $this->archivo = $dato->archivo;
        $this->old_archivo = $dato->archivo;
        $this->observacion = $dato->observacion;
    }

    // FUNCION PARA ACTUALIZAR LOS DATOS
    public function update()
    {
        if ($this->id_arch_programa) {
            $rutaArchivos = 'uploads/' . $this->evaluacion->universidad->universidad . '/' . $this->evaluacion->fecha_creacion . '/' . $this->nombre_criterio . '/' . $this->nombre_indicador . '/FUENTE ' . $this->fuente_id . '/';
            if ($this->archivo != $this->old_archivo) {
                $nombre_archivo_1 = $this->archivo->getClientOriginalName();
                $nombre_archivo = $this->archivo->storeAs($rutaArchivos, $nombre_archivo_1, 'public');
            } else {
                $nombre_archivo = $this->archivo;
            }
            $dato = ArchGestionCalidad::find($this->id_arch_programa);
            $dato->update([
                'archivo' => $nombre_archivo,
                'observacion' => $this->observacion,
                'user_id' => auth()->user()->id,
            ]);
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
            session()->flash('success', 'Registro actualizado satisfactoriamente');
        }
    }

    // FUNCION PARA ELIMINAR DATOS
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
    }

    public function delete()
    {
        ArchGestionCalidad::find($this->delete_id)->delete();
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('message', 'Registro eliminado con éxito.');
    }
}
