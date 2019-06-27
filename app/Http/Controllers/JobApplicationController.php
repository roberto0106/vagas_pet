<?php

namespace App\Http\Controllers;

use App\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function application(Request $request){

        $application = new JobApplication;

        $application->id_company = $request->id_company;
        $application->id_candidate = $request->id_candidate;

        $application->save();
    }
}
