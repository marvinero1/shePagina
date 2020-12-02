<?php

namespace App\Http\Controllers;

use App\Crecimiento;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use File;

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
        $mensaje= 'Seccion de Crecimiento creado exisitosamente!';
        
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
            $extension = explode('images/crecimiento', mime_content_type('images/crecimiento'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/crecimiento';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Seccion de Crecimiento creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $crecimiento = Crecimiento::create($requestData);

        if($crecimiento){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('crecimiento.create'); 
        
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
