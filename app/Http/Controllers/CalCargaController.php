<?php

namespace App\Http\Controllers;

use App\CalCarga;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class CalCargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $calCarga = CalCarga::where('titulo','like',"%$titulo%")->latest()->get();

        return view('carga.index', compact('calCarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $calCarga = CalCarga::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('carga.create', compact('calCarga'));
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
        $mensaje= 'Calculo de Carga creado exisitosamente!';
        
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
            $extension = explode('images/CalCarga', mime_content_type('images/CalCarga'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/CalCarga';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Calculo de Carga creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $calCarga = CalCarga::create($requestData);

        if($calCarga){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('asistenciaTecnica.create'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function show(CalCarga $calCarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function edit(CalCarga $calCarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalCarga $calCarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CalCarga  $calCarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calCarga = CalCarga::findOrFail($id);

        $calCarga->delete();

        Session::flash('message','Calculo de Carga eliminado exitosamente!');
        return redirect()->route('CalCarga.create');
    }
}
