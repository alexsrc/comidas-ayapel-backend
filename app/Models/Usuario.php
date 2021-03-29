<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'edad',
        'id_tipo_usuario',
        'id_ciudad',
        'id_estado'
    ];
}
