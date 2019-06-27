<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function view_create_photos(){
        $user = \Auth::user();
        $usertype = $user->usertype;

        $fotos = Photo::where('id_candidate',$usertype->id)->get();

        return view('candidate.new_album', compact('fotos'));
    }

    public function upload_photo(Request $request){

         //Resgatando dados do usuário logado
        $user = \Auth::user();
        $usertype = $user->usertype;

        //Criando novo model Photo
        $foto = new Photo;

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
        $foto->id_candidate = $usertype->id;
        $foto->path_photo= $path;

        //Salvando dados
        $foto->save();

        //Redirecionando para a rota Vagas
        return redirect()->route('view_create_photos');

    }

    public function delete_photo(Request $request){

        $user = \Auth::user();
        $usertype = $user->usertype;

        $vaga = Photo::find($request->id);
        $vaga->delete();

        return redirect()->route('view_create_photos');
    }
}
