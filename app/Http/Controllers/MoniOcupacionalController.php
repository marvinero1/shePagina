<?php

namespace App\Http\Controllers;

use App\MoniOcupacional;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class MoniOcupacionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniOcupacional = MoniOcupacional::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ocupacional.index', compact('moniOcupacional'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $moniOcupacional = MoniOcupacional::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('ocupacional.create', compact('moniOcupacional'));
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
        $mensaje= 'Monitoreo Ocupacional creado exisitosamente!';
        
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
            $extension = explode('images/moniOcupacional', mime_content_type('images/moniOcupacional'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/moniOcupacional';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Monitoreo Ocupacional creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $moniOcupacional = MoniOcupacional::create($requestData);

        if($moniOcupacional){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('MoniOcupacional.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function show(MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function edit(MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MoniOcupacional $moniOcupacional)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MoniOcupacional  $moniOcupacional
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moniOcupacional = MoniOcupacional::findOrFail($id);

        $moniOcupacional->delete();

        Session::flash('message','Monitoreo Ocupacional eliminado exitosamente!');
        return redirect()->route('MoniOcupacional.create');
    }
}
