<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Indicador;
use Illuminate\Http\Request;

class PorcentajeIndicadorController extends Controller
{
    public function index()
    {
        $criterios = Criterio::all();
        return view('acreditacion_caces.porcentajes.indicadores', compact('criterios'));
    }

    public function store(Request $request)
    {
        try {
            $datos = $request->except('_token');
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['id'] = $key;
                // dd($item);
                $id = Indicador::where('id', $key)->get()->first();
                if ($id != null) {
                    //update
                    Indicador::where('id', $key)->update($item);
                } else {
                    //insert

                    Indicador::insert($item);
                }
            }
            return redirect()->route('porcentaje.indicadores.index')->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('porcentaje.indicadores.index')->with('error', 'Error al crear el registro');
        }
    }
}
