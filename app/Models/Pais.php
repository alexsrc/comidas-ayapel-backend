<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'id',
        'nombre',
        'indicativo',
        'abreviatura'
    ];
}
