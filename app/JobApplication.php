<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{


    public function candidate(){
        return $this->hasMany('App\Candidate','id');
    }

    public function company(){
        return $this->belongsTo('App\Company','id');
    }

    public function vacancy(){
        return $this->hasMany('App\Vacancy','id');
    }

}
