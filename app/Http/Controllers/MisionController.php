<?php

namespace App\Http\Controllers;

use App\Mision;
use Illuminate\Http\Request;

class MisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('mision.index');
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
     * @param  \App\Mision  $mision
     * @return \Illuminate\Http\Response
     */
    public function show(Mision $mision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mision  $mision
     * @return \Illuminate\Http\Response
     */
    public function edit(Mision $mision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mision  $mision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mision $mision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mision  $mision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mision $mision)
    {
        //
    }
}
