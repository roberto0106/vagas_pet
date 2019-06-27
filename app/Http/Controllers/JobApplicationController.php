<?php

namespace App\Http\Controllers;

use App\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function application(Request $request){

        $user = \Auth::user();
        $usertype = $user->usertype;

        $application = new JobApplication;

        $application->id_vacancy = $request->id_vacancy;
        $application->id_company = $request->id_company;
        $application->id_candidate = $usertype->id;

        $application->save();

        dd("Candidatura realizada");
    }
}
