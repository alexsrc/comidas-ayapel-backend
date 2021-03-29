<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'id',
        'nombre',
        'abreviatura',
        'indicativo',
        'id_pais'
    ];
}
