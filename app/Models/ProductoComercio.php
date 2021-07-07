<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoComercio extends Model
{
    protected $table = 'producto_comercios';

    protected $fillable = [
        'id',
        'descripcion',
        'valor',
        'id_comercio',
        'id_producto',
        'id_producto_estado'
    ];

    public $incrementing = true;

    /**
     * Get the Comercio for the ProductoComercio.
     */
    public function comercio()
    {
        return $this->hasMany(Comercio::class,'id_comercio','id');
    }

    /**
     * Get the Producto for the ProductoComercio.
     */
    public function producto()
    {
        return $this->hasMany(Producto::class,'id_producto','id');
    }


    /**
     * Get the ProductoEstado for the ProductoComercio.
     */
    public function productoEstado()
    {
        return $this->hasMany(ProductoEstado::class,'id_producto_estado','id');
    }
}
