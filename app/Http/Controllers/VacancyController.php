<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $vagas = Vacancy::all();
        return view('vacancy',compact('vagas'));
    }
}
