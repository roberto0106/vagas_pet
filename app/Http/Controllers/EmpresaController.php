<?php

namespace App\Http\Controllers;

use App\Vagas;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function steptwo(){
    	return view('auth.register_step_2');
    }

    public function update(Request $request){
    	
    	$user = \Auth::user();
    	$usertype = $user->usertype;

    	$usertype->cnpj=$request->get('cnpj');
    	$usertype->razao_social=$request->get('razaosocial');
    	$usertype->save();

        return redirect()->route('minhasvagas');

    }


    public function minhasvagas(){
        $user = \Auth::user();
        $usertype = $user->usertype;
        $minhasvagas = Vagas::where('empresa',$usertype->razao_social)->get();
        return view('empresa.minhasvagas',compact('minhasvagas'));
    }

    public function novavaga(){
        return view('empresa.novavaga');
    }

    public function createvaga(Request $request){
        $user = \Auth::user();
        $usertype = $user->usertype;
        $vaga = new Vagas;
        $vaga->vaga = $request->get('vaga');
        $vaga->empresa = $usertype->razao_social;
        $vaga->descricao = $request->get('descricao');
        $vaga->save();
        return redirect()->route('minhasvagas');   
    }

    public function deletevaga(Request $request){
        
        $user = \Auth::user();
        $usertype = $user->usertype;
        $vaga = Vagas::find($request->id);
        $vaga->delete();

        return redirect()->route('minhasvagas');

    }

    public function viewupdatevaga(Request $request){
        $vaga = Vagas::find($request->id);
        return view('empresa.updatevaga',compact('vaga'));
    }

    public function updatevaga(Request $request){
        dd($request);
       $vaga = Vagas::find($request->id);
       $vaga->vaga = $request->get('vaga');
       $vaga->save();
       return redirect()->route('minhasvagas');   
    }

}
