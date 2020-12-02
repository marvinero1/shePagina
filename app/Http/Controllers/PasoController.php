<?php

namespace App\Http\Controllers;

use App\Paso;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use File;

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

        return view('pasos.index', compact('paso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $imagen = null;
        $mensaje= 'Seccion de Primeros Pasos creado exisitosamente!';
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);
        
        DB::beginTransaction();
        $requestData = $request->all();
    
        if($request->imagen){
           
            $data = $request->imagen;
            
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/pasos', mime_content_type('images/pasos'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/pasos';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Seccion de Primeros Pasos creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $paso = Paso::create($requestData);

        if($paso){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('pasos.create'); 
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
    public function destroy($id){

        $paso = Paso::findOrFail($id);

        $paso->delete();

        Session::flash('message','Paso eliminado exitosamente!');
        return redirect()->route('pasos.create');
    }
}
