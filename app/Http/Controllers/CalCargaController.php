<?php

namespace App\Http\Controllers;

use App\CalCarga;
use Session;
use Illuminate\Http\Request;

class CalCargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $calCarga = CalCarga::where('titulo','like',"%$titulo%")->latest()->get();

        return view('carga.index', compact('calCarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $calCarga = CalCarga::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('carga.create', compact('calCarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen = null;
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/CalCarga/');
            $imagesUploaded->move($imagenpath, $imageName);

            CalCarga::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/CalCarga/' .$imageName,
            ]);

            Session::flash('message','Calculo de Carga creado exisitosamente!');
            return redirect()->route('CalCarga.create'); 
        }else{
            Session::flash('error','Calculo de Carga no pudo registrarse!');
            return redirect()->route('CalCarga.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function show(CalCarga $calCarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function edit(CalCarga $calCarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalCarga $calCarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calCarga = CalCarga::findOrFail($id);

        $calCarga->delete();

        Session::flash('message','Calculo de Carga eliminado exitosamente!');
        return redirect()->route('CalCarga.create');
    }
}
