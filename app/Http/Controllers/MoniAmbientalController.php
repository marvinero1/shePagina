<?php

namespace App\Http\Controllers;

use App\MoniAmbiental;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class MoniAmbientalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniAmbiental = MoniAmbiental::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ambiental.index', compact('moniAmbiental'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniAmbiental = MoniAmbiental::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ambiental.create', compact('moniAmbiental'));
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
        $mensaje= 'Monitoreo Ambiental creado exisitosamente!';
        
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
            $extension = explode('images/MoniAmbiental', mime_content_type('images/MoniAmbiental'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/MoniAmbiental';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Monitoreo Ambiental creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $moniAmbiental = MoniAmbiental::create($requestData);

        if($moniAmbiental){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('MoniAmbiental.create'); 
   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function show(MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function edit(MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoniAmbiental $moniAmbiental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoniAmbiental  $moniAmbiental
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moniAmbiental = MoniAmbiental::findOrFail($id);

        $moniAmbiental->delete();

        Session::flash('message','Monitoreo Ambiental eliminado exitosamente!');
        return redirect()->route('MoniAmbiental.create');
    }
}
