<?php

namespace App\Http\Controllers;

use App\soluEspecifica;
use Illuminate\Http\Request;
use Session;

class SoluEspecificaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $titulo = $request->get('buscarpor');

        $soluEspecifica = soluEspecifica::where('titulo','like',"%$titulo%")->latest()->get();
        return view('solucionesEspecificas.index', compact('soluEspecifica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $soluEspecifica = soluEspecifica::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('solucionesEspecificas.create', compact('soluEspecifica'));
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
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/soluEspecifica/');
            $imagesUploaded->move($imagenpath, $imageName);

            soluEspecifica::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/soluEspecifica/' .$imageName,
            ]);

            Session::flash('message','Solución Especifica creado exisitosamente!');
            return redirect()->route('solucionesEspecificas.create'); 
        }else{
            Session::flash('error','Solución Especifica no pudo registrarse!');
            return redirect()->route('solucionesEspecificas.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function show(soluEspecifica $soluEspecifica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function edit(soluEspecifica $soluEspecifica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soluEspecifica $soluEspecifica){
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function destroy(soluEspecifica $soluEspecifica)
    {
        //
    }
}
