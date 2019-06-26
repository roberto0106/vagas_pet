<?php

namespace App\Http\Controllers;

use App\Vagas;
use App\Candidato;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vagas = Vagas::All();
        $vagas->ocorrencias = $vagas->count();

        $candidatos = Candidato::All();
        $candidatos->ocorrencias = $candidatos->count();
        //dd($candidatos->ocorrencias);
        return view('dashboard', compact('vagas','candidatos'));
    }

}
