<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuarios';

    protected $fillable = [
        'id',
        'nombre'
    ];
}
