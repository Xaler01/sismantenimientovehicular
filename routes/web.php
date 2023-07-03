<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\PoliciasController;
use App\Http\Controllers\VehiculosController;
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
Route::get('Editar-Dependencia/{id}', [DependenciasController::class,'edit']);
Route::put('Actualizar-Dependencia/{id}', [DependenciasController::class, 'update']);
Route::get('Eliminar-Dependencia/{id}', [DependenciasController::class,'destroy']);

Route::get('Policias', [PoliciasController::class, 'index']); 
Route::post('Policias', [PoliciasController::class,'store']);
Route::get('Editar-Policia/{id}', [PoliciasController::class,'edit']);
Route::put('Actualizar-Policia/{id}', [PoliciasController::class,'update']);
Route::get('Eliminar-Policia/{id}',[PoliciasController::class, 'destroy']);

Route::get('Vehiculos', [VehiculosController::class, 'index']);
Route::get('Crear-Vehiculo', [VehiculosController::class, 'create']);
Route::post('Crear-Vehiculo', [VehiculosController::class, 'store']);
Route::get('Editar-Vehiculo/{id}', [VehiculosController::class,'edit']);
Route::put('Actualizar-Vehiculo/{id}', [VehiculosController::class,'update']);
Route::get('EliminarVehiculo/{id}',[VehiculosController::class, 'destroy']);

