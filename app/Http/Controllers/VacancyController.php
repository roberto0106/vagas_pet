<?php

namespace App\Http\Controllers;

use App\JobApplication;
use App\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $usertype = $user->usertype;

        $candidaturas = JobApplication::where('id_candidate',$usertype->id)->pluck('id_vacancy')->toArray();

        $vagas = Vacancy::all();

        return view('vacancy',compact('vagas','candidaturas', 'usertype'));
    }
}
