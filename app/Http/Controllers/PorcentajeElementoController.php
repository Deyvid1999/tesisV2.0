<?php

namespace App\Http\Controllers;

use App\Models\Criterio;
use App\Models\ElementoFundamental;
use Illuminate\Http\Request;

class PorcentajeElementoController extends Controller
{
    public function index()
    {
        $criterios = Criterio::all();
        return view('acreditacion_caces.porcentajes.elementos', compact('criterios'));
    }

    public function store(Request $request)
    {
        try {
            $datos = $request->except('_token');
            foreach ($datos as $key => $item) {
                // dd($item);
                $item['id'] = $key;
                // dd($item);
                $id = ElementoFundamental::where('id', $key)->get()->first();
                if ($id != null) {
                    //update
                    ElementoFundamental::where('id', $key)->update($item);
                } else {
                    //insert

                    ElementoFundamental::insert($item);
                }
            }
            return redirect()->route('porcentaje.elementos.index')->with('success', 'Registro exitoso.');
        } catch (\Exception $e) {
            return redirect()->route('porcentaje.elementos.index')->with('error', 'Error al crear el registro');
        }
    }
}
