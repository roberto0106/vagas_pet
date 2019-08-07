<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function steptwo(){
        return view('auth.candidato_step_2');
    }

    public function update(Request $request){

        //Resgatando dados do usuário logado
        $user = \Auth::user();
        $usertype = $user->usertype;

        //Armazenando envio da primeira foto para o portifólio do candidato


        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $fileTypeContent = $file->extension();

            //Array de tipos de arquivos válidos
            $typesValid = array('jpeg','jpg');

            //Validação do formato do arquivo recebido
            if(in_array($fileTypeContent,$typesValid))
            {
                if ($request->file('photo')->isValid()) {
                    $path = $request->photo->store('images',['disk'=>'public']);

                }

            }else{

                dd( "No!Unvalidated File");
            }
        }

        //Armazenando novos dados no model
        $usertype->name=$request->get('nome');
        $usertype->last_name=$request->get('sobrenome');
        @$usertype->photo=$path;

        //Salvando dados
        $usertype->save();

        //Redirecionando para a rota Vagas
        return redirect('/vacancies');



    }

    public function index()
    {

        $candidatos = Candidate::get();

        return view('candidates',compact('candidatos'));
    }

    public function download_photo(){

        return Storage::download('images\buda.jpeg');

    }

    public function  my_application(){
        return "Minhas candidaturas";
    }

}
