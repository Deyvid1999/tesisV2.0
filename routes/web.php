<?php

use App\Http\Controllers\CondicionesInstitucionalesController;
use App\Http\Controllers\CriterioController;
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
use App\Http\Controllers\Admin\IndicadorAssignmentsController;
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

    Route::resource('universidades', UniversidadController::class)->names('universidades');


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

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    
    Route::resource('criteria-assignments', CriteriaAssignmentsController::class)->names('criteria.assignments');
    Route::resource('indicador-assignments', IndicadorAssignmentsController::class)->names('indicador.assignments');
    
    //////////////////////////////////////////////////LIVEWIRE//////////////////////////////////////////////
    Route::get('{eva_id}/criterio/{cri_id}', [CriterioController::class, 'criterio'])->name('criterio');
});





