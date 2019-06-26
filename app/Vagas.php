<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vagas extends Model
{
	protected $table = 'vagas';

	protected $fillable = [
        'vaga',
        'empresa',
        'id_candidato'      
    ];


}
