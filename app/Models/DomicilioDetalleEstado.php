<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomicilioDetalleEstado extends Model
{
    protected $table = 'domicilio_detalle_estados';

    protected $fillable = [
        'id',
        'nombre',
        'estado' // 1 ó 0
    ];

    public $incrementing = true;

    /**
     * Get the DomicilioDetalle that owns the DomicilioDetalleEstado.
     */
    public function DomicilioDetalle()
    {
        return $this->belongsTo(DomicilioDetalle::class);
    }
}
