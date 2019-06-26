<?php

namespace App\Http\Controllers;


use App\Candidato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidatoController extends Controller
{
public function steptwo(){
    return view('auth.candidato_step_2');
}

public function update(Request $request){

     //Resgatando dados do usuário logado
    $user = \Auth::user();
    $usertype = $user->usertype;

    //Armazenando envio da primeira foto para o portifólio do candidato
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

    //Armazenando novos dados no model
    $usertype->nome=$request->get('nome');
    $usertype->sobrenome=$request->get('sobrenome');
    $usertype->portifolio_photo_1=$path;

    //Salvando dados
    $usertype->save();

    //Redirecionando para a rota Vagas
    return redirect('/vagas');

}

public function index()
{
    $candidatos = Candidato::all();
  return view('candidatos',compact('candidatos'));
}

public function download_photo(){

    return Storage::download('images\buda.jpeg');

}


}
