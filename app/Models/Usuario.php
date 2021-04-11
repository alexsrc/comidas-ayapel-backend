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
        'id_usuario_tipo',
        'id_ciudad',
        'id_usuario_estado'
    ];

    public $incrementing = true;

    /**
     * Get the UsuarioTipo associated with the Usuario.
     */
    public function usuarioTipo()
    {
        return $this->hasOne(UsuarioTipo::class,'id_usuario_tipo','id');
    }

    /**
     * Get the Ciudad associated with the Usuario.
     */
    public function ciudad()
    {
        return $this->hasOne(Ciudad::class,'id_ciudad','id');
    }

    /**
     * Get the UsuarioEstado associated with the Usuario.
     */
    public function usuarioEstado()
    {
        return $this->hasOne(UsuarioEstado::class,'id_usuario_estado','id');
    }


    /**
     * Get the UsuarioDireccion that owns the Usuario.
     */
    public function usuarioDireccion()
    {
        return $this->belongsTo(UsuarioDireccion::class);
    }

}
