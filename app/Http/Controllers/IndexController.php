<?php

namespace App\Http\Controllers;

use App\Index;
use Session;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $imagen = $request->get('buscarpor');

        $index = Index::where('imagen','like',"%$imagen%")->latest()->get();

        return view('incio.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        $imagen = $request->get('buscarpor');
        $index = Index::where('imagen','like',"%$imagen%")->latest()->get();

        return view('inicio.create', compact('index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $imagen = null;
        
        $request->validate([
            'imagen' => 'required',
            'video_url' => 'required',
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/index/');
            $imagesUploaded->move($imagenpath, $imageName);

            Index::create([
                'video_url' => $request->video_url,
                
                'imagen' => '/images/index/' .$imageName,
            ]);

            Session::flash('message','Index creado exisitosamente!');
            return redirect()->route('index.create'); 
        }else{
            Session::flash('error','Index no pudo registrarse!');
            return redirect()->route('index.create'); 
        } 
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
