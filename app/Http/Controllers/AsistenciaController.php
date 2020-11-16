<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Session;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $asistencia = Asistencia::where('titulo','like',"%$titulo%")->latest()->get();
        return view('asistencia.index', compact('asistencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $asistencia = Asistencia::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('asistencia.create', compact('asistencia'));
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
            $imagenpath = public_path('/images/asistencia/');
            $imagesUploaded->move($imagenpath, $imageName);

            Asistencia::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/asistencia/' .$imageName,
            ]);

            Session::flash('message','Asistencia creado exisitosamente!');
            return redirect()->route('asistenciaTecnica.create'); 
        }else{
            Session::flash('error','Asistencia no pudo registrarse!');
            return redirect()->route('asistenciaTecnica.create'); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $asistencia = Asistencia::findOrFail($id);

        $asistencia->delete();

        Session::flash('message','Asistencia eliminado exitosamente!');
        return redirect()->route('asistenciaTecnica.create');
    }
}
