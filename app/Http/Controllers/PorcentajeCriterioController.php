<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use Illuminate\Http\Request;

class PorcentajeCriterioController extends Controller
{
    public function index()
    {
        $criterios = Criterio::all();
        return view('acreditacion_caces.porcentajes.criterios', compact('criterios'));
    }

    public function store(Request $request)
    {
        try {
            $datos = $request->except('_token');
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['id'] = $key;
                // dd($item);
                $id = Criterio::where('id', $key)->get()->first();
                if ($id != null) {
                    //update
                    Criterio::where('id', $key)->update($item);
                } else {
                    //insert

                    Criterio::insert($item);
                }
            }
            return redirect()->route('porcentaje.criterios.index')->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('porcentaje.criterios.index')->with('error', 'Error al crear el registro');
        }
    }
}
