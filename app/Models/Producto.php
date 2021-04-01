<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'imagen',
        'id_producto_estado'
    ];

    /**
     * Get the ProductoEstado associated with the Producto.
     */
    public function productoEstado()
    {
        return $this->hasOne(ProductoEstado::class,'id_producto_estado','id');
    }
}
