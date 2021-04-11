<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioDireccion extends Model
{
    protected $table = 'usuario_direcciones';

    protected $fillable = [
        'id',
        'direccion',
        'ubicacion',
        'descripcion',
        'id_usuario'
    ];

    public $incrementing = true;

    /**
     * Get the Usuario associated with the Usuario.
     */
    public function usuario()
    {
        return $this->hasMany(Usuario::class);
    }
}
