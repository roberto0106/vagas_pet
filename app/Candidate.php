<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    protected $fillable = [
        'name','last_name'
    ];

    public function vacancies(){
        return $this->hasMany('App\Vacancy', 'id_candidate');
    }

    public function photos(){
        return $this->hasMany('App\Photo', 'id_candidate');
    }

}
