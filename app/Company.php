<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','cnpj',
    ];

    public function vacancy(){
        return $this->hasMany('App\Vacancy','id');
    }

    public function candidates(){
        return $this->hasMany('App\Candidate','id');
    }

}
