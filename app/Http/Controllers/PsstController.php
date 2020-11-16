<?php

namespace App\Http\Controllers;

use App\Psst;
use Session;
use Illuminate\Http\Request;

class PsstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('psst.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $psst = Psst::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('PSST.create', compact('psst'));
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
            $imagenpath = public_path('/images/Psst/');
            $imagesUploaded->move($imagenpath, $imageName);

            Psst::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                
                'imagen' => '/images/Psst/' .$imageName,
            ]);

            Session::flash('message','Psst creado exisitosamente!');
            return redirect()->route('PSST.create'); 
        }else{
            Session::flash('error','Psst no pudo registrarse!');
            return redirect()->route('PSST.create'); 
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Psst  $psst
     * @return \Illuminate\Http\Response
     */
    public function show(Psst $psst)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Psst  $psst
     * @return \Illuminate\Http\Response
     */
    public function edit(Psst $psst)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Psst  $psst
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Psst $psst)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Psst  $psst
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $psst = Psst::findOrFail($id);

        $psst->delete();

        Session::flash('message','Psst eliminado exitosamente!');
        return redirect()->route('PSST.create');
    }
}
