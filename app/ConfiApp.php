<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfiApp extends Model
{
    public static function usertype(){
        return [
            'App\Candidate'=>'Candidato',
            'App\Company'=>'Empresa',
        ];
    }


}
