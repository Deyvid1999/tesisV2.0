<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    public function index()
    {
        $universidades = Universidad::all();
        return view('acreditacion_caces.universidades.index', compact('universidades'));
    }

    public function create()
    {
        return view('acreditacion_caces.universidades.create');
    }

    // PARA GUARDAD LA INFROMACION DEL FORMULARIO 
    public function store(Request $request)
    {

        $universidad = $request->except('_token');
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $randomCode = substr(str_shuffle($characters), 0, 8);
        $universidad['codigo_unico'] = $randomCode;

        $uni = $request->universidad;

        if ($request->hasFile('foto')) {
            $universidad['foto'] = $request->file('foto')->storeAs('uploads/universidades/' . $uni, 'foto.jpg', 'public');
        }

        if ($request->hasFile('informe')) {
            $universidad['informe'] = $request->file('informe')->storeAs('uploads/universidades/' . $uni, 'informe.pdf', 'public');
        }

        Universidad::insert($universidad);
        return redirect()->route('universidades.index');
    }

    // PARA MOSTRAR LA INFORMACION DEL REGISTRO A EDITAR
    public function edit($id)
    {
        $universidad = Universidad::find($id);
        return view('acreditacion_caces.universidades.edit', compact('universidad'));
    }

    // PARA GUARDAR LA INFORMACION EDITADA
    public function update(Request $request, $id)
    {
        $universidad = $request->except('_token', '_method');
        $uni = $request->universidad;

        if ($request->hasFile('foto')) {
            $universidad['foto'] = $request->file('foto')->storeAs('uploads/universidades/' . $uni, 'foto.jpg', 'public');
        }

        if ($request->hasFile('informe')) {
            $universidad['informe'] = $request->file('informe')->storeAs('uploads/universidades/' . $uni, 'informe.pdf', 'public');
        }

        Universidad::where('id', $id)->update($universidad);
        return redirect()->route('universidades.index');
    }

    // PARA ELIMINAR UN REGISTRO
    public function destroy($id)
    {
        Universidad::destroy($id);
        return redirect()->route('universidades.index');
    }
}
