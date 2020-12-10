<?php

namespace App\Http\Controllers;

use App\Index;
use Session;
use Illuminate\Http\Request;
use Image;
use DB;
use File;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        // $index = DB::where('indices');

        // $index = DB::table('indices')->get();

        // return view('index.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $imagen = $request->get('buscarpor');
        $index = Index::where('imagen','like',"%$imagen%")->latest()->get();

        return view('index.create', compact('index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $imagen = null;
        $mensaje= 'Index creado exisitosamente!';
        
        $request->validate([
            'imagen' => 'required',
            'video_url' => 'required',
        ]);

        DB::beginTransaction();
        $requestData = $request->all();
    
        if($request->imagen){
           
            $data = $request->imagen;
            
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/index', mime_content_type('images/index'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/index';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Index creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $index = Index::create($requestData);

        if($index){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('index.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $index = Index::findOrFail($id);

        $index->delete();

        Session::flash('message','Index eliminado exitosamente!');
        return redirect()->route('index.create');
    }
}
