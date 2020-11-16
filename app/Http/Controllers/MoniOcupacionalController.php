<?php

namespace App\Http\Controllers;

use App\MoniOcupacional;
use Session;
use Illuminate\Http\Request;

class MoniOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('ocupacional.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniOcupacional = MoniOcupacional::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ocupacional.create', compact('moniOcupacional'));
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
            $imagenpath = public_path('/images/moniOcupacional/');
            $imagesUploaded->move($imagenpath, $imageName);

            MoniOcupacional::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/moniOcupacional/' .$imageName,
            ]);

            Session::flash('message','Monitoreo Ocupacional creado exisitosamente!');
            return redirect()->route('MoniOcupacional.create'); 
        }else{
            Session::flash('error','Monitoreo Ocupacional no pudo registrarse!');
            return redirect()->route('MoniOcupacional.create'); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function show(MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function edit(MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moniOcupacional = MoniOcupacional::findOrFail($id);

        $moniOcupacional->delete();

        Session::flash('message','Monitoreo Ocupacional eliminado exitosamente!');
        return redirect()->route('MoniOcupacional.create');
    }
}
