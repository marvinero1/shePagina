<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisionController extends Controller
{
    public function index(Request $request){

        return view('mision.index');
    }
}
