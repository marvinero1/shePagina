<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoreoAmbientalController extends Controller
{
    public function index(Request $request){

        return view('ambiental.index');
    }
}
