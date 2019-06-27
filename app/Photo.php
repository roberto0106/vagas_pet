<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=[
    'path_photo'
    ];

    public function candidates(){
        return $this->belongsTo('App\Candidate','id');
    }

}
