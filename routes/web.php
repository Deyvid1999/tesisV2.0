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
use App\Http\Controllers\Admin\UserHasCriterioController;
use App\Models\UserHasCriterio;

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
// CONFIGURACION DE PORCENTAJES
Route::middleware('auth')->resource('porcentaje/criterios', PorcentajeCriterioController::class)->names('porcentaje.criterios');
Route::middleware('auth')->resource('porcentaje/subcriterios', PorcentajeSubcriterioController::class)->names('porcentaje.subcriterios');
Route::middleware('auth')->resource('porcentaje/indicadores', PorcentajeIndicadorController::class)->names('porcentaje.indicadores');
Route::middleware('auth')->resource('porcentaje/elementos', PorcentajeElementoController::class)->names('porcentaje.elementos');

// PARA CREAR UNIVERSIDADES
Route::middleware('auth')->resource('universidades', UniversidadController::class)->names('universidades');
//PARA CREAR LAS EVALUACIONES
Route::middleware('auth')->get('evaluaciones/{id}', [EvaluacionController::class, 'index'])->name('evaluaciones.index');
Route::middleware('auth')->post('evaluaciones', [EvaluacionController::class, 'store'])->name('evaluaciones.store');

// PARA CREAR LA COMPARATIVA DE LOS VALORES
Route::middleware('auth')->get('historico-grafico/{id}', [HistoricoController::class, 'grafico'])->name('historico.grafico.index');
Route::middleware('auth')->get('historico/{id}', [HistoricoController::class, 'index'])->name('historico.index');


// INDICADORES
Route::middleware('auth')->get('indicadores/{id}', [IndicadorController::class, 'index'])->name('indicadores.index');
// CRITERIOS
// Route::middleware('auth')->get('condiciones-institucionales/{id}', [CondicionesInstitucionalesController::class, 'index'])->name('condiciones.institucionales.index');
// Route::middleware('auth')->post('condiciones-institucionales', [CondicionesInstitucionalesController::class, 'store'])->name('condiciones.institucionales.store');
// Route::middleware('auth')->get('docencia/{id}', [DocenciaController::class, 'index'])->name('docencia.index');
// Route::middleware('auth')->post('docencia', [DocenciaController::class, 'store'])->name('docencia.store');
// Route::middleware('auth')->get('personal-academico/{id}', [PersonalAcademicoController::class, 'index'])->name('personal.academico.index');
// Route::middleware('auth')->get('investigacion/{id}', [InvestigacionController::class, 'index'])->name('investigacion.index');
// Route::middleware('auth')->get('vinculacion/{id}', [VinculacionController::class, 'index'])->name('vinculacion.index');
// Route::middleware('auth')->post('vinculacion', [VinculacionController::class, 'store'])->name('vinculacion.store');
// Route::middleware('auth')->get('gestion-calidad/{id}', [GestionCalidadController::class, 'index'])->name('gestion.calidad.index');
// Route::middleware('auth')->post('gestion-calidad', [GestionCalidadController::class, 'store'])->name('gestion.calidad.store');

//INFORMES
Route::middleware('auth')->get('informes-criterios/{id}', [InformesCriteriosController::class, 'index'])->name('informes.criterios.index');
Route::middleware('auth')->get('informes-oportunidad-mejora/{id}', [InformesCriteriosController::class, 'mejora'])->name('informes.mejora');

//RESULTADOS
Route::middleware('auth')->get('indicadores/condiciones-institucionales/{id}', [IndicadorController::class, 'resultadoCriterio1'])->name('condiciones.institucionales.resultado');
Route::middleware('auth')->get('indicadores/docencia/{id}', [IndicadorController::class, 'resultadoCriterio2'])->name('docencia.resultado');
Route::middleware('auth')->get('indicadores/personal-academico/{id}', [IndicadorController::class, 'resultadoCriterio3'])->name('personal.academico.resultado');
Route::middleware('auth')->get('indicadores/investigacion/{id}', [IndicadorController::class, 'resultadoCriterio4'])->name('investigacion.resultado');
Route::middleware('auth')->get('indicadores/vinculacion/{id}', [IndicadorController::class, 'resultadoCriterio5'])->name('vinculacion.resultado');
Route::middleware('auth')->get('indicadores/gestion-calidad/{id}', [IndicadorController::class, 'resultadoCriterio6'])->name('gestion.calidad.resultado');

//INFORMES
Route::middleware('auth')->get('personal-academico/excel/{id}', [PersonalAcademicoController::class, 'personalAcademicoExcel'])->name('personal.academico.excel');
Route::middleware('auth')->get('informes/informe-general/{id}', [InformesCriteriosController::class, 'informeGeneralPdf'])->name('personal.academico.informeGeneral');
Route::middleware('auth')->get('informes/informe-especifico/{id}', [InformesCriteriosController::class, 'informeEspecificoPdf'])->name('personal.academico.informeEspecifico');


Route::middleware('auth')->post('register', [RegisterController::class,'create'])->name('create_user');

// Route::middleware('auth')->resource('criteria-assignments', CriteriaAssignmentsController::class)->names('criteria.assignments')->except('show');
// Route::middleware('auth')->get('criteria-assignments/{id}', [CriteriaAssignmentsController::class,'index'])->name('criteria.assignments.index');

Route::middleware('auth')->resource('criteria-assignments', CriteriaAssignmentsController::class)->names('criteria.assignments');

//////////////////////////////////////////////////LIVEWIRE//////////////////////////////////////////////
Route::middleware('auth')->get('{eva_id}/criterio/{cri_id}', [CriterioController::class, 'criterio'])->name('criterio');


