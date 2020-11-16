<?php

namespace App\Http\Controllers;

use App\Curso;
use Session;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titulo = $request->get('buscarpor');

        $curso = Curso::where('titulo','like',"%$titulo%")->latest()->paginate(10);

        return view('cursos.create', compact('curso'));
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
        
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'instructor' => 'required',
            'descripcion_instructor' => 'required',
        ]);

        if(request()->has('imagen')){
            $imagesUploaded = request()->file('imagen');
            $imageName = time() . '.' . $imagesUploaded->getClientOriginalExtension();
            $imagenpath = public_path('/images/curso/');
            $imagesUploaded->move($imagenpath, $imageName);

            Curso::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'instructor' => $request->instructor,
                'descripcion_instructor' => $request->descripcion_instructor,
                
                'imagen' => '/images/curso/' .$imageName,
            ]);

            Session::flash('message','Curso creado exisitosamente!');
            return redirect()->route('cursos.create'); 
        }else{
            Session::flash('error','Curso no pudo registrarse!');
            return redirect()->route('cursos.create'); 
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        Session::flash('message','Curso eliminado exitosamente!');
        return redirect()->route('cursos.create');
    }
}
