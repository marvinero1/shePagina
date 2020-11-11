<?php

namespace App\Http\Controllers;

use App\Historia;
use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    public function index(Request $request){

        return view('historia.index');
    }
}
