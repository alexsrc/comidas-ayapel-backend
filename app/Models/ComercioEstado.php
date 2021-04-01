<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComercioEstado extends Model
{
    protected $table = 'comercio_estados';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion'
    ];

    /**
     * Get the Comercio that owns the ComercioEstado.
     */
    public function comercio()
    {
        return $this->belongsTo(ComercioEstado::class,'id_comercio_estado');
    }
}
