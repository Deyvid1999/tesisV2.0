<?php

use App\Http\Controllers\CondicionesInstitucionalesController;
use App\Http\Controllers\Criterio1Controller;
use App\Http\Controllers\DocenciaController;
use App\Http\Controllers\EvaluacionController;
use App\Http\Controllers\GestionCalidadController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\IndicadorController;
use App\Http\Controllers\InformesCriteriosController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\PersonalAcademicoController;
use App\Http\Controllers\PorcentajeCriterioController;
use App\Http\Controllers\PorcentajeElementoController;
use App\Http\Controllers\PorcentajeIndicadorController;
use App\Http\Controllers\PorcentajeSubcriterioController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\VinculacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController; 
use App\Http\Controllers\Admin\CriteriaAssignmentsController;
use App\Http\Controllers\Admin\UserHasCriterioController;
use App\Models\UserHasCriterio;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:Admin'])->group(function () {
        // PARA CREAR UNIVERSIDADES
        Route::get('universidades/create', [UniversidadController::class, 'create'])->name('universidades.create');
    });

    Route::resource('universidades', UniversidadController::class)->except(['create'])->names('universidades');


        // CONFIGURACION DE PORCENTAJES
    Route::resource('porcentaje/criterios', PorcentajeCriterioController::class)->names('porcentaje.criterios');
    Route::resource('porcentaje/subcriterios', PorcentajeSubcriterioController::class)->names('porcentaje.subcriterios');
    Route::resource('porcentaje/indicadores', PorcentajeIndicadorController::class)->names('porcentaje.indicadores');
    Route::resource('porcentaje/elementos', PorcentajeElementoController::class)->names('porcentaje.elementos');
    
    

    //PARA CREAR LAS EVALUACIONES
    Route::get('evaluaciones/{id}', [EvaluacionController::class, 'index'])->name('evaluaciones.index');
    Route::post('evaluaciones', [EvaluacionController::class, 'store'])->name('evaluaciones.store');
    
    // PARA CREAR LA COMPARATIVA DE LOS VALORES
    Route::get('historico-grafico/{id}', [HistoricoController::class, 'grafico'])->name('historico.grafico.index');
    Route::get('historico/{id}', [HistoricoController::class, 'index'])->name('historico.index');
    
    
    // INDICADORES
    Route::get('indicadores/{id}', [IndicadorController::class, 'index'])->name('indicadores.index');
    // CRITERIOS
    // Route::get('condiciones-institucionales/{id}', [CondicionesInstitucionalesController::class, 'index'])->name('condiciones.institucionales.index');
    // Route::post('condiciones-institucionales', [CondicionesInstitucionalesController::class, 'store'])->name('condiciones.institucionales.store');
    // Route::get('docencia/{id}', [DocenciaController::class, 'index'])->name('docencia.index');
    // Route::post('docencia', [DocenciaController::class, 'store'])->name('docencia.store');
    // Route::get('personal-academico/{id}', [PersonalAcademicoController::class, 'index'])->name('personal.academico.index');
    // Route::get('investigacion/{id}', [InvestigacionController::class, 'index'])->name('investigacion.index');
    // Route::get('vinculacion/{id}', [VinculacionController::class, 'index'])->name('vinculacion.index');
    // Route::post('vinculacion', [VinculacionController::class, 'store'])->name('vinculacion.store');
    // Route::get('gestion-calidad/{id}', [GestionCalidadController::class, 'index'])->name('gestion.calidad.index');
    // Route::post('gestion-calidad', [GestionCalidadController::class, 'store'])->name('gestion.calidad.store');
    
    //INFORMES
    Route::get('informes-criterios/{id}', [InformesCriteriosController::class, 'index'])->name('informes.criterios.index');
    Route::get('informes-oportunidad-mejora/{id}', [InformesCriteriosController::class, 'mejora'])->name('informes.mejora');
    
    //RESULTADOS
    Route::get('indicadores/condiciones-institucionales/{id}', [IndicadorController::class, 'resultadoCriterio1'])->name('condiciones.institucionales.resultado');
    Route::get('indicadores/docencia/{id}', [IndicadorController::class, 'resultadoCriterio2'])->name('docencia.resultado');
    Route::get('indicadores/personal-academico/{id}', [IndicadorController::class, 'resultadoCriterio3'])->name('personal.academico.resultado');
    Route::get('indicadores/investigacion/{id}', [IndicadorController::class, 'resultadoCriterio4'])->name('investigacion.resultado');
    Route::get('indicadores/vinculacion/{id}', [IndicadorController::class, 'resultadoCriterio5'])->name('vinculacion.resultado');
    Route::get('indicadores/gestion-calidad/{id}', [IndicadorController::class, 'resultadoCriterio6'])->name('gestion.calidad.resultado');
    
    //INFORMES
    Route::get('personal-academico/excel/{id}', [PersonalAcademicoController::class, 'personalAcademicoExcel'])->name('personal.academico.excel');
    Route::get('informes/informe-general/{id}', [InformesCriteriosController::class, 'informeGeneralPdf'])->name('personal.academico.informeGeneral');
    Route::get('informes/informe-especifico/{id}', [InformesCriteriosController::class, 'informeEspecificoPdf'])->name('personal.academico.informeEspecifico');
    
    //////////////////////////////////////////////////LIVEWIRE//////////////////////////////////////////////
    Route::get('criterio-1/{id}', [Criterio1Controller::class, 'criterio1'])->name('criterio_1');
    Route::get('criterio-2/{id}', [Criterio1Controller::class, 'criterio2'])->name('criterio_2');
    Route::get('criterio-3/{id}', [Criterio1Controller::class, 'criterio3'])->name('criterio_3');
    Route::get('criterio-4/{id}', [Criterio1Controller::class, 'criterio4'])->name('criterio_4');
    Route::get('criterio-5/{id}', [Criterio1Controller::class, 'criterio5'])->name('criterio_5');
    Route::get('criterio-6/{id}', [Criterio1Controller::class, 'criterio6'])->name('criterio_6');
    
    Route::post('register', [RegisterController::class,'create'])->name('create_user');
    
    Route::resource('criteria-assignments', CriteriaAssignmentsController::class)->names('criteria.assignments')->except('show');
    Route::get('criteria-assignments/{id}', [CriteriaAssignmentsController::class,'index'])->name('criteria.assignments.index');
    
    Route::resource('criteria-assignments', CriteriaAssignmentsController::class)->names('criteria.assignments');


});





