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

Route::get('/historia', 'HistoriaController@index')->name('historia');

Route::get('/mision', 'MisionController@index')->name('mision');

Route::get('/monitoreoAmbiental', 'MonitoreoAmbientalController@index')->name('monitoreoAmbiental');

Route::get('/monitoreoOcupacional', 'MonitoreoOcupacionalController@index')->name('monitoreoOcupacional');

Route::get('/asistenciaTecnica', 'AsistenciaController@index')->name('asistenciaTecnica');

Route::get('/PSST', 'PsstController@index')->name('PSST');

Route::get('/diagnosticoIntegrales', 'DiagnosticoController@index')->name('diagnosticoIntegrales');

Route::get('/calculoCargaFuego', 'CalculoCargaController@index')->name('calculoCargaFuego');

Route::get('/campoEntrenamiento', 'CampoEntrenamientoController@index')->name('campoEntrenamiento');

Route::get('/cursos', 'CursosController@index')->name('cursos');

Route::get('/noticias', 'NoticiasController@index')->name('noticias');

Route::get('/contactos', 'ContactanosController@index')->name('contactos');