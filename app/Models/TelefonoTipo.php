<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefonoTipo extends Model
{
    protected $table = 'tipo_telefonos';

    protected $fillable = [
        'id',
        'nombre'
    ];

    /**
     * Get the Telefono that owns the TelefonoTipo.
     */
    public function telefono()
    {
        return $this->belongsTo(Telefono::class);
    }
}
