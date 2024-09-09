<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criterio;
use App\Models\User;
use App\Models\UserHasCriterio;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class CriteriaAssignmentsController extends Controller
{
    public function index($id)
    {
        $criterios=Criterio::all();
        $criterios->pop(1)::with("users")->get();
        $users= User::all();
        $evaluacion = Evaluacion::find($id);
        echo("<script>console.log('PHP: " . $evaluacion . "');</script>");
        return view('acreditacion_caces.criteria-assignments.index',compact('criterios','users','evaluacion'));
    }  

    public function store(Request $request){
        $userId=$request->user_id;
        $criterioId=$request->criterio_id;   
        $evaluacionId=$request->evaluacion_id;
        UserHasCriterio::insert(['user_id'=>$userId,'criterio_id'=>$criterioId]);
        $user=User::find($userId);        
        $user->assignRole('CriteriaR');
        $user->givePermissionTo("criterio_$criterioId");

        $criterios=Criterio::all();
        $criterios->pop(1)::with("users")->get();
        $users= User::all();
        $evaluacion = Evaluacion::find($evaluacionId);
        return view('acreditacion_caces.criteria-assignments.index',compact('criterios','users','evaluacion'));      
    }
}
