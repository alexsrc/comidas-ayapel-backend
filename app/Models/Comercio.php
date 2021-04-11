<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comercio extends Model
{
    protected $table = 'comercios';

    protected $fillable = [
        'id',
        'nombre',
        'razon_social',
        'direccion',
        'imagen',
        'id_ciudad',
        'id_comercio_estado',
        'id_comercio_tipo',
        'id_propietario', //es el id de la tabla usuario id_usuario
        'id_telefono'
    ];

    public $incrementing = true;


    /**
     * Get the Ciudad associated with the Comercio.
     */
    public function ciudad()
    {
        return $this->hasOne(Ciudad::class,'id_ciudad','id');
    }

    /**
     * Get the ComercioEstado associated with the Comercio.
     */
    public function comercioEstado()
    {
        return $this->hasOne(ComercioEstado::class,'id_comercio_estado','id');
    }

    /**
     * Get the ComercioTipo associated with the Comercio.
     */
    public function comercioTipo()
    {
        return $this->hasOne(ComercioTipo::class,'id_comercio_tipo','id');
    }

    /**
     * Get the Usuario associated with the Comercio.
     */
    public function propietario()
    {
        return $this->hasOne(Usuario::class,'id_propietario','id');
    }

    /**
     * Get the Telefono associated with the Comercio.
     */
    public function telefono()
    {
        return $this->hasOne(Telefono::class,'id_telefono','id');
    }
}
