<?php

namespace App\Http\Controllers;

use App\Vagas;
use Illuminate\Http\Request;

class VagasController extends Controller
{

    public function index()
    {
      $vagas = Vagas::all();
      return view('vagas',compact('vagas'));
    }
  
}