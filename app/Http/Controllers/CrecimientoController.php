<?php

namespace App\Http\Controllers;

use App\Crecimiento;
use Illuminate\Http\Request;
use Session;

class CrecimientoController extends Controller
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
        $crecimiento = Crecimiento::get();

        return view('crecimiento.index', compact('crecimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"asdsadasd";
        $imagen = null;
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);
        
        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/crecimiento/');
            $imagesUploaded->move($imagenpath, $imageName);

            Crecimiento::create([
                'titulo' => $request->titulo,
                'texto1' => $request->texto1,
                'texto2' => $request->texto2,
                'texto3' => $request->texto3,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/crecimiento/' .$imageName,
            ]);

            Session::flash('message','Seccion de Crecimiento creado exisitosamente!');
            return redirect()->route('crecimiento.create'); 
        }else{
            Session::flash('error','Seccion de Crecimiento no pudo registrarse!');
            return redirect()->route('crecimiento.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crecimiento  $crecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Crecimiento $crecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crecimiento  $crecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Crecimiento $crecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crecimiento  $crecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crecimiento $crecimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crecimiento  $crecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crecimiento = Crecimiento::findOrFail($id);

        $crecimiento->delete();

        Session::flash('message','Crecimiento eliminado exitosamente!');
        return redirect()->route('crecimiento.create');
    }
}
