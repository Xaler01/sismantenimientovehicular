<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Policias;
use App\Models\Rangos;
use Illuminate\Http\Request;

use PDF;
use App\Models\SolicitudMantenimiento;
use App\Models\Subcircuitos;
use App\Models\TipoMantenimiento;
use App\Models\TipoVehiculos;
use App\Models\Vehiculos;

class PdfController extends Controller
{
    public function generarPdf($id)
    {
        $orden = SolicitudMantenimiento::find($id);

        $usuario = Policias::find($orden->user_id);
        $rango = Rangos::where('id', $usuario->rango_id)->first();
        $subcircuito = Subcircuitos::where('id', $usuario -> dependencia_id )->first();
        $vehiculo = Vehiculos::where('id', $orden->vehiculo_id)->first();
        $tipodevehiculo = TipoVehiculos::where('id',$orden->tipo_vehiculo_id)->first();
        $marca = Marcas::where('id',$vehiculo->marca_id)->first();
        $mantenimiento   = TipoMantenimiento::where('id',$orden->tipo_mantenimiento_id)->first();

        if (!$orden || !$usuario || !$rango || !$subcircuito|| !$vehiculo|| !$tipodevehiculo|| !$marca|| !$mantenimiento) {
            abort(404); // Manejo de orden, usuario, rango o subcircuito no encontrados
        }

         //$pdf = PDF::loadView('Editar-Orden', ['orden' => $orden]);
        $pdf = PDF::loadView('pdf', compact('orden','usuario','rango','subcircuito','vehiculo','tipodevehiculo','marca','mantenimiento'));
    


        return $pdf->stream(); // Abre el PDF en el navegador
    }
}
