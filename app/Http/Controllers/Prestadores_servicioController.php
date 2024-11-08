<?php

namespace App\Http\Controllers;

use App\Models\Presentado;
use Illuminate\Http\Request;

class Prestadores_servicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('prestadores_servicio.mostrar_prestadores');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function documentos($id){
        $documentos = Presentado::where('tramite_id',$id)->get();
        return view('documentos_presentados.mostrar_documentosp',compact('documentos'));
    }
}
