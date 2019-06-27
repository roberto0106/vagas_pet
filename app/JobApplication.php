<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{


    public function candidate(){
        return $this->hasMany('App\Candidate','id_candidate');
    }

    public function company(){
        return $this->hasMany('App\Company','id_company');
    }

    public function vacancy(){
        return $this->hasMany('App\Vacancy','id_vacancy');
    }

}
