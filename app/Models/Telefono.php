<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';

    protected $fillable = [
        'id',
        'numero',
        'id_departamento',
        'id_tipo_telefono'
    ];
}
