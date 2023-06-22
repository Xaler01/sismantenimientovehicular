<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\PoliciasController;
use Illuminate\Support\Facades\Auth;
use App\Models\Dependencias;
use App\Models\Policias;
use Symfony\Component\ErrorHandler\Debug;

Route::get('/', function () {
    return view('modulos.Seleccionar');
});

Route::get('/Ingresar', function () {
    return view('modulos.Ingresar');
});


Auth::routes();

Route::get('Inicio', [InicioController::class, 'index']); 

Route::get('Dependencias', [DependenciasController::class, 'index']);
Route::post('Dependencias', [DependenciasController::class, 'store']);
Route::put('Dependencia/{id}', [DependenciasController::class,'update']);
Route::delete('borrar-Dependencia/{id}', [DependenciasController::class,'destroy']);

Route::get('Policias', [PoliciasController::class, 'index']); 
Route::post('Policias', [PoliciasController::class,'store']);
Route::get('Eliminar-Policia/{id}',[PoliciasController::class, 'destroy']);


