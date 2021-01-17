<?php

namespace App\Http\Controllers;

use App\soluEspecifica;
use Illuminate\Http\Request;
use Session;
use Image;
use DB;
use File;

class SoluEspecificaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $titulo = $request->get('buscarpor');

        $soluEspecifica = soluEspecifica::where('titulo','like',"%$titulo%")->latest()->get();
        return view('solucionesEspecificas.index', compact('soluEspecifica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $soluEspecifica = soluEspecifica::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('solucionesEspecificas.create', compact('soluEspecifica'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $imagen = null;
        $mensaje= 'Solución Especifica Registrado correctamente';
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        DB::beginTransaction();
        $requestData = $request->all();
    
        if($request->imagen){
           
            $data = $request->imagen;
            
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/soluEspecifica', mime_content_type('images/soluEspecifica'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/soluEspecifica';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Solución Especifica Registrado correctamente';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $soluEspecifica = soluEspecifica::create($requestData);

        if($soluEspecifica){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('solucionesEspecificas.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function show(soluEspecifica $soluEspecifica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function edit(soluEspecifica $soluEspecifica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, soluEspecifica $soluEspecifica){
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\soluEspecifica  $soluEspecifica
     * @return \Illuminate\Http\Response
     */
    public function destroy(soluEspecifica $soluEspecifica)
    {
        $soluEspecifica = Diagnostico::findOrFail($id);

        $soluEspecifica->delete();

        Session::flash('message','Solucion Especifica eliminado exitosamente!');
        return redirect()->route('soluEspecifica.create');
    }
}
