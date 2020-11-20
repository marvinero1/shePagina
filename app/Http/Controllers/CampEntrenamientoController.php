<?php

namespace App\Http\Controllers;

use App\CampEntrenamiento;
use Illuminate\Http\Request;
use Session;

class CampEntrenamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $campEntrenamiento = CampEntrenamiento::get();

        return view('campoEntrenamiento.index', compact('campEntrenamiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $campEntrenamiento = CampEntrenamiento::get();

        return view('campoEntrenamiento.create', compact('campEntrenamiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $video = null;
        
        $request->validate([
            'video' => 'required',
        ]);

        if(request()->has('video')){
            $imagesUploaded = request()->file('video');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/campoEntrenamiento/');
            $imagesUploaded->move($imagenpath, $imageName);

            CampEntrenamiento::create([
                
                'video' => '/images/campoEntrenamiento/' .$imageName,
            ]);

            Session::flash('message','Campo Entrenamiento creado exisitosamente!');
            return redirect()->route('campoEntrenamiento.create'); 
        }else{
            Session::flash('error','Campo Entrenamiento no pudo registrarse!');
            return redirect()->route('campoEntrenamiento.create'); 
        }
        
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
    public function destroy($id){

        $campEntrenamiento = CampEntrenamiento::findOrFail($id);

        $campEntrenamiento->delete();

        Session::flash('message','Campo Entrenamiento eliminado exitosamente!');
        return redirect()->route('campoEntrenamiento.create');
        
    }
}
