<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoreoOcupacionalController extends Controller
{
    public function index(Request $request){

        return view('ocupacional.index');
    }
}
