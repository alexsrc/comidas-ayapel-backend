<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    protected $table = 'comercios';

    protected $fillable = [
        'id',
        'nombre',
        'razon_social',
        'direccion',
        'imagen',
        'id_estado',
        'id_tipo_comercio',
        'id_propietario',
        'id_telefono'
    ];
}
