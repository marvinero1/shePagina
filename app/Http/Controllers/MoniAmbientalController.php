<?php

namespace App\Http\Controllers;

use App\MoniAmbiental;
use Session;
use Illuminate\Http\Request;

class MoniAmbientalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniAmbiental = MoniAmbiental::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ambiental.index', compact('moniAmbiental'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniAmbiental = MoniAmbiental::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ambiental.create', compact('moniAmbiental'));
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
            $imagenpath = public_path('/images/MoniAmbiental/');
            $imagesUploaded->move($imagenpath, $imageName);

            MoniAmbiental::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/MoniAmbiental/' .$imageName,
            ]);

            Session::flash('message','Monitoreo Ambiental creado exisitosamente!');
            return redirect()->route('MoniAmbiental.create'); 
        }else{
            Session::flash('error','Monitoreo Ambiental no pudo registrarse!');
            return redirect()->route('MoniAmbiental.create'); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function show(MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function edit(MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moniAmbiental = MoniAmbiental::findOrFail($id);

        $moniAmbiental->delete();

        Session::flash('message','Monitoreo Ambiental eliminado exitosamente!');
        return redirect()->route('MoniAmbiental.create');
    }
}
