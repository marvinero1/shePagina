<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use Session;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $diagnostico = Diagnostico::where('titulo','like',"%$titulo%")->latest()->get();
        return view('diagnostico.index', compact('diagnostico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $diagnostico = Diagnostico::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('diagnostico.create', compact('diagnostico'));
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
            $imagenpath = public_path('/images/diagnosticoIntegrales/');
            $imagesUploaded->move($imagenpath, $imageName);

            Diagnostico::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/diagnosticoIntegrales/' .$imageName,
            ]);

            Session::flash('message','Diagnostico creado exisitosamente!');
            return redirect()->route('diagnosticoIntegrales.create'); 
        }else{
            Session::flash('error','Diagnostico no pudo registrarse!');
            return redirect()->route('diagnosticoIntegrales.create'); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostico $diagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnostico  $diagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnostico $diagnostico)
    {
        //
    }
}
