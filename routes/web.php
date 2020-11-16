<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes();
    

    Route::resource('/historia', 'HistoriaController');
    
    Route::resource('/mision', 'MisionController');
    
    Route::resource('/MoniAmbiental', 'MoniAmbientalController');
    
    Route::resource('/MoniOcupacional', 'MoniOcupacionalController');
    
    Route::resource('/asistenciaTecnica', 'AsistenciaController');
    
    Route::resource('/PSST', 'PsstController');
    
    Route::resource('/diagnosticoIntegrales', 'DiagnosticoController');
    
    Route::resource('/CalCarga', 'CalCargaController');
    
    Route::resource('/campoEntrenamiento', 'CampEntrenamientoController');
    
    Route::resource('/cursos', 'CursoController');
    
    Route::resource('/noticias', 'NoticiaController');
    
    Route::resource('/contactanos', 'ContactoController');


Route::middleware(['auth'])->group(function () {
    Route::resource('/home', 'HomeController@create');
});
