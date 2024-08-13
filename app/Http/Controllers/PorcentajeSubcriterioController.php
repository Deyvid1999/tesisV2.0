<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\Subcriterio;
use Illuminate\Http\Request;

class PorcentajeSubcriterioController extends Controller
{
    public function index()
    {
        $criterios = Criterio::all();
        return view('acreditacion_caces.porcentajes.subcriterios', compact('criterios'));
    }

    public function store(Request $request)
    {
        try {
            $datos = $request->except('_token');
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['id'] = $key;
                // dd($item);
                $id = Subcriterio::where('id', $key)->get()->first();
                if ($id != null) {
                    //update
                    Subcriterio::where('id', $key)->update($item);
                } else {
                    //insert

                    Subcriterio::insert($item);
                }
            }
            return redirect()->route('porcentaje.subcriterios.index')->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('porcentaje.subcriterios.index')->with('error', 'Error al crear el registro');
        }
    }
}
