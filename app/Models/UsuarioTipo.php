<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioTipo extends Model
{
    protected $table = 'tipo_usuarios';

    protected $fillable = [
        'id',
        'nombre'
    ];

    public $incrementing = true;

    /**
     * Get the Usuario that owns the UsuarioEstado.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_tipo');
    }
}
