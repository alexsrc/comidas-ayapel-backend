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
        'imagen',
        'id_tipo_usuario',
        'id_ciudad',
        'id_estado'
    ];

    /**
     * Get the TelefonoTipo associated with the Telefono.
     */
    public function telefonoTipo()
    {
        return $this->hasOne(TelefonoTipo::class,'id_telefono_tipo','id');
    }
}
