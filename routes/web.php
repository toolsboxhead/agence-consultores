<?php

use App\Http\Controllers\ComercialController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DatosController;


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

route::view('/','main')->name('main');
Route::view('graficar','comercial.graphs.grafica')->name('grafica');
Route::get('/performance_comercial',[ComercialController::class,'listarConsultores'])->name('comercial.perfcomercial');
Route::post('/tabla_datos',[ComercialController::class,'mostrarAcumuladoPorMes'])->name('comercial.datos_performance');
Route::post('/actualizar-tabla', [ComercialController::class,'obtenerDatos'])->name('comercial.datos_perfomance');
Route::post('grafica-bar',[ComercialController::class,'graficaBarras'])->name('comercial.graficabarras');
Route::post('grafica-pie',[ComercialController::class,'graficaAreas'])->name('comercial.graficaArea');
Route::post('miJqueryAjax',[AjaxController::class,'index']);
Route::post('acumulado-Mes',[DatosController::class,'mostrarDatosUsuario'])->name('datosview');
Route::get('/datos-view',[DatosController::class,'mostrarVista'])->name('comercial1.datosview');
