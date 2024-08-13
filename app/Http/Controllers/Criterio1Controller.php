<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\EscalaCualitativo;
use App\Models\EscalaDocente;
use App\Models\Evaluacion;
use App\Models\Indicador;
use App\Models\Subcriterio;
use Illuminate\Http\Request;

class Criterio1Controller extends Controller
{
    public function criterio1($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(1);
        $sub_criterios = Subcriterio::where('criterio_id', 1)->get();
        return view('livewire.criterio1.subcriterio1.indicador1.index', compact('evaluacion', 'sub_criterios', 'criterio'));
    }
    
    public function criterio2($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(2);
        $indicadores = Indicador::where('criterio_id', 2)->get();        
        return view('livewire.criterio2.indicador10.index', compact('evaluacion', 'criterio', 'indicadores'));
    }    

    public function criterio3($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(3);
        $sub_criterios = Subcriterio::where('criterio_id', 3)->get();
        return view('livewire.criterio3.indicador13.index', compact('evaluacion', 'sub_criterios', 'criterio'));
    }

    public function criterio4($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(4);
        $sub_criterios = Subcriterio::where('criterio_id', 4)->get();
        return view('livewire.criterio4.indicador24.index', compact('evaluacion', 'sub_criterios', 'criterio'));
    }

    public function criterio5($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(5);
        $indicadores = Indicador::where('criterio_id', 5)->get();
        return view('livewire.criterio5.indicador27.index', compact('evaluacion', 'criterio', 'indicadores'));
    }

    public function criterio6($id)
    {
        $evaluacion = Evaluacion::find($id);
        $criterio = Criterio::find(6);
        $indicadores = Indicador::where('criterio_id', 6)->get();
        return view('livewire.criterio6.indicador30.index', compact('evaluacion', 'criterio', 'indicadores'));
    }
}
