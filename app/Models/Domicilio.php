<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    protected $table = 'domicilios';

    protected $fillable = [
        'id',
        'direccion',
        'descripcion',
        'celular',
        'nombres',
        'fecha_creacion',
        'id_domicilio_estado',
        'id_ciudad',
        'direccion_descripcion',
        'longitud',
        'latitud',

    ];

    public $incrementing = true;

    /**
     * Get the DomicilioEstado associated with the Domicilio.
     */
    public function domicilioEstado()
    {
        return $this->hasOne(ComercioEstado::class,'id_domicilio_estado','id');
    }

    /**
     * Get the DomicilioDetalle that owns the Domicilio.
     */
    public function domicilioDetalle()
    {
        return $this->belongsTo(DomicilioDetalle::class,'id_domicilio');
    }

    /**
     * Get the ciudad that owns the Domicilio.
     */
    public function ciudad()
    {
        return $this->belongsTo(DomicilioDetalle::class,'id_domicilio');
    }
}
