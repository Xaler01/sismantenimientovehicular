<?php

namespace App\Http\Controllers;

use App\Models\InformeExamen;
use App\Models\Informes;
use Illuminate\Http\Request;

class InformesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexinf1()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){
            return redirect('Inicio');
        }
        $informeMAM = Informes::all();

        return view('modulos.Informe1', compact('informeMAM'));
    }

    public function indexinf2()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){
            return redirect('Inicio');
        }

        $informeEP = InformeExamen::all();

        return view('modulos.Informe2', compact('informeEP'));
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
    public function show(Informes $informes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informes $informes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informes $informes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informes $informes)
    {
        //
    }
}
