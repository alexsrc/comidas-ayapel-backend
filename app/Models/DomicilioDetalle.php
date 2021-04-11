<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomicilioDetalle extends Model
{
    protected $table = 'domicilio_detalles';

    protected $fillable = [
        'id',
        'id_producto',
        'id_domicilio',
        'id_domicilio_detalle_estado'
    ];

    public $incrementing = true;

    /**
     * Get the Domicilio for the DomicilioDetalle.
     */
    public function Domicilio()
    {
        return $this->hasMany(Domicilio::class,'id_domicilio','id');
    }

    /**
     * Get the DomicilioEstadoDetalle associated with the DomicilioDetalle.
     */
    public function domicilioEstadoDetalle()
    {
        return $this->hasOne(DomicilioDetalleEstado::class,'id_domicilio_estado_detalle','id');
    }

}
