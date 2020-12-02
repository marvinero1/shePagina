<?php

namespace App\Http\Controllers;

use App\Noticia;
use Session;
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
        $imagen_portada = null;

        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'sec_1' => 'required',
            'descripcion_sec_1' => 'required',
            'imagen_portada' => 'required',
        ]);


        if(request()->has('imagen_portada')){
            if(request()->has('imagen_seccion')){
                $imagesUploaded = request()->file('imagen_portada');
                $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
                $imagenpath = public_path('/images/noticia/');
                $path  = 'images/noticia';
                $imagesUploaded->move($path, $imageName);

                $imagen_seccionUploaded = request()->file('imagen_seccion');
                $imagen_seccionName = time() . '.' . $imagen_seccionUploaded->getClientOriginalExtension();
                $path = '/images/noticia';
                $imagen_seccionUploaded->move($path, $imagen_seccionName);
            }
           
            Noticia::create([
                'titulo' => $request->titulo,
                'autor' => $request->autor,
                'descripcion' => $request->descripcion,
                'sec_1' => $request->sec_1,
                'sec_2' => $request->sec_2,
                'sec_3' => $request->sec_3,
                'descripcion_sec_1' => $request->descripcion_sec_1,
                'descripcion_sec_2' => $request->descripcion_sec_2,
                'descripcion_sec_3' => $request->descripcion_sec_3,
                
                'imagen_portada' => '/images/noticia/' .$imageName,
                'imagen_seccion' => '/images/noticia/' .$imagen_seccionName,

            ]);

            Session::flash('message','Noticia creado exisitosamente!');
            return redirect()->route('noticias.create'); 
        }else{
            Session::flash('error','Noticia no pudo registrarse!');
            return redirect()->route('noticias.create'); 
        }     
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
