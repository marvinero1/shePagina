<?php

namespace App\Http\Controllers;

use App\Diagnostico;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

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
        $mensaje= 'Diagnostico creado exisitosamente!';
        
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
            $extension = explode('images/diagnosticoIntegrales', mime_content_type('images/diagnosticoIntegrales'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/diagnosticoIntegrales';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Diagnostico creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $diagnostico = Diagnostico::create($requestData);

        if($diagnostico){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('diagnosticoIntegrales.create'); 
 
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
    public function destroy($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);

        $diagnostico->delete();

        Session::flash('message','Diagnostico eliminado exitosamente!');
        return redirect()->route('diagnostico.create');
    }
}
