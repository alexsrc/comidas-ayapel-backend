<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoEstado extends Model
{
    protected $table = 'producto_estados';

    protected $fillable = [
        'id',
        'nombre',
        'estado' // 1 ó 0
    ];

    /**
     * Get the Producto that owns the Pais.
     */
    public function Producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
