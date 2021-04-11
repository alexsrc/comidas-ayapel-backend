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

    public $incrementing = true;

    /**
     * Get the Usuario that owns the UsuarioEstado.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_estado');
    }
}
