<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoComercio extends Model
{
    protected $table = 'tipo_comercios';

    protected $fillable = [
        'id',
        'nombre'
    ];
}
