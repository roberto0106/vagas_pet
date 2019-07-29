<?php

namespace App\Http\Controllers;

use App\JobApplication;
use App\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class JobApplicationController extends Controller
{
    public function application(Request $request)
    {

        $user = \Auth::user();
        $usertype = $user->usertype;

        $application = new JobApplication;

        $application->id_vacancy = $request->id_vacancy;
        $application->id_company = $request->id_company;
        $application->id_candidate = $usertype->id;

        $application->save();

        Session::flash('msg', "Candidatura x realizada");

        return redirect()->route('my_application');
    }

    public function my_application()
    {
        $user = \Auth::user();
        $usertype = $user->usertype;
        /** @var JobApplication $my_appplication */
        $my_application = JobApplication::where('id_candidate', $usertype->id)->get();

        return view('candidate.my_application', compact('my_application'));
    }

    public function checkin($job)
    {

        $user = \Auth::user();
        $usertype = $user->usertype;

        $vaga = Vacancy::find($job);

        if (!$vaga) {
            return [
                'error' => 'true',
                'menssage' => 'essa vaga não existe',
            ];
        }

        $candidatetrue = JobApplication::where('id_candidate', $usertype->id)
            ->where('id_vacancy', $job)
            ->get()->count();

        if ($candidatetrue > 0) {
            return [
                'error' => 'true',
                'menssage' => 'Ja candidatado',
            ];
        }

        $application = new JobApplication;

        $application->id_vacancy = $job;
        $application->id_company = $vaga->id_company;
        $application->id_candidate = $usertype->id;

        $application->save();

        return [
            'error' => 'false',
            'menssage' => 'Candidatura realizada com sucesso!',
        ];

    }
}
