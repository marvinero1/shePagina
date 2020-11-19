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

        return view('resumen.create', compact('paso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        echo "asdasdasdas";
        
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            
        ]);
        $imagen = null;
        dd($request);
        
        // if(request()->has('imagen')){
        //     $imagesUploaded = request()->file('imagen');
        //     $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
        //     $imagenpath = public_path('/images/paso/');
        //     $imagesUploaded->move($imagenpath, $imageName);

        //     Paso::create([
        //         'titulo' => $request->titulo,
        //         'descripcion' => $request->descripcion,
                
        //         'imagen' => '/images/paso/' .$imageName,
        //     ]);

        //     Session::flash('message','Seccion de Primeros Pasos creado exisitosamente!');
        //     return redirect()->route('resumen.create'); 
        // }else{
        //     Session::flash('error','Seccion de Primeros Pasos no pudo registrarse!');
        //     return redirect()->route('resumen.create'); 
        // } 
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
    public function destroy(Paso $paso)
    {
        //
    }
}
