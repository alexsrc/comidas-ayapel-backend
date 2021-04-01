<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DomicilioEstado extends Model
{
    protected $table = 'domicilio_estados';

    protected $fillable = [
        'id',
        'nombre',
        'estado' // 1 ó 0
    ];

    /**
     * Get the Domicilio that owns the DomicilioEstado.
     */
    public function Domicilio()
    {
        return $this->belongsTo(Domicilio::class);
    }
}
