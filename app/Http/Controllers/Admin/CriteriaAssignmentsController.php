<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Criterio;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\UserHasCriterio;
use App\Models\Evaluacion;
use Illuminate\Http\Request;

class CriteriaAssignmentsController extends Controller
{
    public function index($id)
    {
        $aux=[];
        $criterios=Criterio::all();
        $users= User::all();
        $evaluacion = Evaluacion::find($id);
        foreach ($criterios as $key => $criterio) {
            $criId=$criterio->id;
                $permission=Permission::where("name","=", "$criId/$id")->first();
        }
        echo("<script>console.log('PHP: " . $evaluacion . "');</script>");
        return view('acreditacion_caces.criteria-assignments.index',compact('criterios','users','evaluacion'));
    }  
    
    public function store(Request $request){
        $userId=$request->user_id;
        $criterioId=$request->criterio_id;   
        $evaluacionId=$request->evaluacion_id;
    

        $user=User::find($userId);        
        $user->assignRole('CriteriaR');
        Permission::create(['name'=> "$evaluacionId/$criterioId","guard_name"=> 'web']);
        $user->givePermissionTo("$evaluacionId/$criterioId");

        $criterios=Criterio::all();
        $users= User::all();
        $evaluacion = Evaluacion::find($evaluacionId);
        return view('acreditacion_caces.criteria-assignments.index',compact('criterios','users','evaluacion'));      
    }
}
