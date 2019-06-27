<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'vacancy',
        'company',
        'id_candidate',
        'id_company'
    ];

    public function candidates(){
        return $this->hasMany('App\Candidate','id');
    }

    public function companies(){
        return $this->belongsTo('App\Company','id');
    }
}
