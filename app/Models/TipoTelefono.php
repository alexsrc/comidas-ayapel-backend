<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTelefono extends Model
{
    protected $table = 'tipo_telefonos';

    protected $fillable = [
        'id',
        'nombre'
    ];
}
