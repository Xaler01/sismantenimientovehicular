<?php

namespace App\Http\Controllers;

use App\Models\SolicituMantenimiento;
use Illuminate\Http\Request;

class SolicituMantenimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        if(auth()->user()->rol == "Policia" && $id != auth() -> user()->id){
            return redirect('Inicio');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicituMantenimiento $solicituMantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicituMantenimiento $solicituMantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicituMantenimiento $solicituMantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicituMantenimiento $solicituMantenimiento)
    {
        //
    }
}
