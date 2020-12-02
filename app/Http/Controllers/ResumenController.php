<?php

namespace App\Http\Controllers;

use App\Resumen;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use File;

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
        $mensaje= 'Resumen Registrado correctamente';

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
            'video_url' => 'required',
        ]);

        DB::beginTransaction();
        $requestData = $request->all();
    
        if($request->imagen){
           
            $data = $request->imagen;
            
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/resumen', mime_content_type('images/resumen'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/resumen';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Resumen Registrado correctamente';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $resumen = Resumen::create($requestData);

        if($resumen){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('resumen.create'); 
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
