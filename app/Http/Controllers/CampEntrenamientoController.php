<?php

namespace App\Http\Controllers;

use App\CampEntrenamiento;
use Illuminate\Http\Request;

class CampEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('campoEntrenamiento.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CampEntrenamiento  $campEntrenamiento
     * @return \Illuminate\Http\Response
     */
    public function show(CampEntrenamiento $campEntrenamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CampEntrenamiento  $campEntrenamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(CampEntrenamiento $campEntrenamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CampEntrenamiento  $campEntrenamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampEntrenamiento $campEntrenamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CampEntrenamiento  $campEntrenamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampEntrenamiento $campEntrenamiento)
    {
        //
    }
}
