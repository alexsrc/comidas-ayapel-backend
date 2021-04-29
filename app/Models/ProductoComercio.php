<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoComercio extends Model
{
    protected $table = 'producto_comercios';

    protected $fillable = [
        'id',
        'descripcion',
        'id_comercio',
        'id_producto'
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
}
