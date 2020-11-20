<?php

namespace App\Http\Controllers;

use App\Resumen;
use Illuminate\Http\Request;
use Session;

class ResumenController extends Controller
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
        $resumen = Resumen::get();

        return view('resumen.index', compact('resumen'));
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
            'video_url' => 'required',
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/resumen/');
            $imagesUploaded->move($imagenpath, $imageName);

            Resumen::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'video_url' => $request->video_url,
                
                'imagen' => '/images/resumen/' .$imageName,
            ]);

            Session::flash('message','Seccion de Resumen creado exisitosamente!');
            return redirect()->route('resumen.create'); 
        }else{
            Session::flash('error','Seccion de Resumen no pudo registrarse!');
            return redirect()->route('resumen.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function show(Resumen $resumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Resumen $resumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resumen $resumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resumen = Resumen::findOrFail($id);

        $resumen->delete();

        Session::flash('message','Resumen eliminado exitosamente!');
        return redirect()->route('resumen.create');
    }
}
