<?php

namespace App\Http\Controllers;

use App\Paso;
use Illuminate\Http\Request;
use Session;

class PasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paso = Paso::get();

        return view('pasos.index', compact('paso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $imagen = null;
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);
        
       
        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/pasos/');
            $imagesUploaded->move($imagenpath, $imageName);

            Paso::create([
                'titulo' => $request->titulo,
                'texto1' => $request->texto1,
                'texto2' => $request->texto2,
                'texto3' => $request->texto3,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/pasos/' .$imageName,
            ]);

            Session::flash('message','Seccion de Primeros Pasos creado exisitosamente!');
            return redirect()->route('pasos.create'); 
        }else{
            Session::flash('error','Seccion de Primeros Pasos no pudo registrarse!');
            return redirect()->route('pasos.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paso  $paso
     * @return \Illuminate\Http\Response
     */
    public function show(Paso $paso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paso  $paso
     * @return \Illuminate\Http\Response
     */
    public function edit(Paso $paso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paso  $paso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paso $paso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paso  $paso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $paso = Paso::findOrFail($id);

        $paso->delete();

        Session::flash('message','Paso eliminado exitosamente!');
        return redirect()->route('pasos.create');
    }
}
