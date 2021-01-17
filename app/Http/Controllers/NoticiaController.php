<?php

namespace App\Http\Controllers;

use App\Noticia;
use Session;
use Image;
use DB;
use File;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $descripcion = $request->get('buscarpor');

        $noticia = Noticia::where('descripcion','like',"%$descripcion%")->latest()->paginate(10);

        return view('noticias.index', compact('noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $descripcion = $request->get('buscarpor');

        $noticia = Noticia::where('descripcion','like',"%$descripcion%")->latest()->paginate(10);

        return view('noticias.create', compact('noticia'));
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
        $mensaje= 'Curso creado exisitosamente!';

        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]);


        DB::beginTransaction();
        $requestData = $request->all();
    
        if($request->imagen){
           
            $data = $request->imagen;
            
            $file = file_get_contents($request->imagen);
            $info = $data->getClientOriginalExtension(); 
            $extension = explode('images/noticia', mime_content_type('images/noticia'))[0];
            $image = Image::make($file);
            $fileName = rand(0,10)."-".date('his')."-".rand(0,10).".".$info; 
            $path  = 'images/noticia';
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $img = $path.'/'.$fileName; 
            if($image->save($img)) {
                $requestData['imagen'] = $img;
                $mensaje= 'Noticia creado creado exisitosamente!';
            }else{
                $mensaje = "Error al guardar la imagen";
            }
        }

        $noticia = Noticia::create($requestData);

        if($noticia){
            DB::commit();
        }else{
            DB::rollback();
        }

        Session::flash('message',$mensaje);
            return redirect()->route('noticias.create'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $noticia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        $noticia->delete();

        Session::flash('message','Noticias eliminado exitosamente!');
        return redirect()->route('noticias.create');
    }
}
