<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\PoliciasController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\PersonalSubcircuitoController;
use App\Http\Controllers\VehiculoSubcircuitoController;
use App\Http\Controllers\SolicitudMantenimientoController;
use App\Http\Controllers\AsignarVehiculoController;
use App\Http\Controllers\CircuitosController;
use App\Http\Controllers\ParroquiasController;
use App\Http\Controllers\SubcircuitosController;
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

Route::get('Parroquias', [ParroquiasController::class, 'index'])->name('parroquias.index');
Route::post('Parroquias', [ParroquiasController::class, 'store'])->name('parroquias.store');
Route::get('Editar-Parroquias/{id}', [ParroquiasController::class, 'edit'])->name('parroquias.edit');
Route::put('Actualizar-Parroquia/{id}', [ParroquiasController::class, 'update'])->name('parroquias.update');
Route::get('Eliminar-Parroquia/{id}', [ParroquiasController::class,'destroy']);

Route::get('Dependencias', [DependenciasController::class, 'index']);
Route::post('Dependencias', [DependenciasController::class, 'store']);
Route::get('Editar-Dependencia/{id}', [DependenciasController::class,'edit']);
Route::put('Actualizar-Dependencia/{id}', [DependenciasController::class, 'update']);
Route::get('Eliminar-Dependencia/{id}', [DependenciasController::class,'destroy']);

Route::get('Circuitos', [CircuitosController::class, 'index']);

Route::get('/obtener-parroquias/{provincia}', 'SubcircuitosController@obtenerParroquias');
Route::get('/obtener-numero-subcircuitos/{circuitoId}', 'SubcircuitoController@obtenerNumeroSubcircuitos');


Route::get('Subcircuitos', [SubcircuitosController::class, 'index']);
Route::post('Subcircuitos', [SubcircuitosController::class, 'store']);
Route::get('Editar-Subcircuitos/{id}', [SubcircuitosController::class, 'edit']);
Route::put('Actualizar-Subcircuito/{id}', [SubcircuitosController::class, 'update']);
Route::get('Eliminar-Subcircuito/{id}', [SubcircuitosController::class,'destroy']);


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

Route::get('PersonalSubcircuito', [PersonalSubcircuitoController::class, 'index']);
Route::get('PersonalSubcircuito/{id}', [PersonalSubcircuitoController::class, 'edit']);
Route::put('PersonalSubcircuito/{id}', [PersonalSubcircuitoController::class, 'update'])->name('PersonalSubcircuito.update');

Route::get('VehiculoSubcircuito', [VehiculoSubcircuitoController::class, 'index']);
Route::get('VehiculoSubcircuito/{id}', [VehiculoSubcircuitoController::class, 'edit']);
Route::put('VehiculoSubcircuito/{id}', [VehiculoSubcircuitoController::class, 'update'])->name('VehiculoSubcircuito.update');

Route::get('AsignarVehiculo', [AsignarVehiculoController::class, 'index'])->name('AsignarVehiculo');
Route::get('AsignarVehiculoPersonal/{id}', [AsignarVehiculoController::class, 'edit']);
Route::put('PersonalVehiculo/{id}', [AsignarVehiculoController::class, 'update'])->name('PersonalVehiculo.update');


//Route::get('SolicitudMantenimiento/{id}', [SolicitudMantenimientoController::class, 'index']);
Route::get('SolicitudMantenimiento', [SolicitudMantenimientoController::class, 'index'])->name('modulos.SolicitudMantenimiento');
Route::get('/tipo-mantenimiento/{id}', [SolicitudMantenimientoController::class, 'getDetalleMantenimiento']);
Route::get('obtenerVehiculoUsuario/{userId}', [SolicitudMantenimientoController::class, 'obtenerVehiculoUsuario'])->name('obtenerVehiculoUsuario');
Route::post('guardar-solicitud', [SolicitudMantenimientoController::class, 'store'])->name('guardar-solicitud');
Route::delete('borrar-solicitud', [SolicitudMantenimientoController::class, 'destroy'])->name('borrar-solicitud');
