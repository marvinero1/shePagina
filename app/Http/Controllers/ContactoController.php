<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use Mail;

class ContactoController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

       // Form validatio

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'asunto'=>'required',
            'mensaje' => 'required'
        ]);

        Contacto::create($request->all());

        //  Send mail to admin
        Mail::to('mail', array(
            'nombre' => $request->get('nombre'),
            'email' => $request->get('email'),
            'asunto' => $request->get('asunto'),
            'mensaje' => $request->get('mensaje'),
        ), 
        //  Store data in database
        
        function($message) use ($request){
            $message->from($request->email);
            $message->to('info@shebolivia.net', 'Admin')->subject($request->get('subject'));
        }); 
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
