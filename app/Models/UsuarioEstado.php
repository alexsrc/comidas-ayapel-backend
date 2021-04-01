<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioEstado extends Model
{
    protected $table = 'usuario_estados';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion'
    ];
}
