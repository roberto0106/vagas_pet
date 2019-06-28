<?php

namespace App\Http\Controllers;


use App\Vacancy;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function steptwo(){
        return view('auth.register_step_2');
    }

    public function update(Request $request){

        $user = \Auth::user();
        $usertype = $user->usertype;

        $usertype->cnpj=$request->get('cnpj');
        $usertype->name=$request->get('razaosocial');
        $usertype->save();

        return redirect()->route('my_vacancies');

    }

    public function minhasvagas(){
        $user = \Auth::user();
        $usertype = $user->usertype;
        $minhasvagas = Vacancy::where('id_company',$usertype->id)->get();

        return view('company.my_vacancy',compact('minhasvagas'));
    }

    public function novavaga(){
        return view('company.new_vacancy');
    }

    public function createvaga(Request $request){
        $user = \Auth::user();
        $usertype = $user->usertype;
        $vaga = new Vacancy;
        $vaga->vacancy = $request->get('vaga');
        $vaga->company = $usertype->name;
        $vaga->description = $request->get('descricao');
        $vaga->id_company = $usertype->id;
        $vaga->save();
        return redirect()->route('my_vacancies');
    }

    public function deletevaga(Request $request){

        $user = \Auth::user();
        $usertype = $user->usertype;
        $vaga = Vacancy::find($request->id);
        $vaga->delete();

        return redirect()->route('my_vacancies');

    }

    public function view_update_vacancy(Request $request){
        $vaga = Vacancy::find($request->id);
        return view('company.update_vacancy',compact('vaga'));
    }

    public function updatevaga(Request $request){

        $vaga = Vacancy::find($request->id);

        $vaga->vacancy = $request->get('vaga');
        $vaga->description = $request->get('description');
        $vaga->save();

        return redirect()->route('my_vacancies');
    }
}
