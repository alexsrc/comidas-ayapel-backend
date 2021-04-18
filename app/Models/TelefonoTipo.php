<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelefonoTipo extends Model
{
    protected $table = 'telefono_tipos';

    protected $fillable = [
        'id',
        'nombre'
    ];

    public $incrementing = true;

    /**
     * Get the Telefono that owns the TelefonoTipo.
     */
    public function telefono()
    {
        return $this->belongsTo(Telefono::class);
    }
}
