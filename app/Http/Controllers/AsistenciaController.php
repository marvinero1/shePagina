<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $asistencia = Asistencia::where('titulo','like',"%$titulo%")->latest()->get();
        return view('asistencia.index', compact('asistencia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $asistencia = Asistencia::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('asistencia.create', compact('asistencia'));
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
        $mensaje= 'Asistencia  creado exisitosamente!';
        
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
            $extension = explode('images/asistencia', mime_content_type('images/asistencia'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/asistencia';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Asistencia creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $asistencia = Asistencia::create($requestData);

        if($asistencia){
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
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencia $asistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asistencia  $asistencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $asistencia = Asistencia::findOrFail($id);

        $asistencia->delete();

        Session::flash('message','Asistencia eliminado exitosamente!');
        return redirect()->route('asistenciaTecnica.create');
    }
}
