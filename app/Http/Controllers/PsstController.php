<?php

namespace App\Http\Controllers;

use App\Psst;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class PsstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $psst = Psst::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('psst.index', compact('psst'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $titulo = $request->get('buscarpor');

        $psst = Psst::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('psst.create', compact('psst'));
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
        $mensaje= 'Psst creado exisitosamente!';
        
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
            $extension = explode('images/Psst', mime_content_type('images/Psst'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/Psst';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Psst creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $psst = Psst::create($requestData);

        if($psst){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('PSST.create'); 
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
