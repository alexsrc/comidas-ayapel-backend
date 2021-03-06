<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComercioTipo extends Model
{
    protected $table = 'comercio_tipos';

    protected $fillable = [
        'id',
        'nombre',
        'imagen'
    ];

    public $incrementing = true;

    /**
     * Get the Comercio that owns the ComercioTipo.
     */
    public function comercio()
    {
        return $this->belongsTo(Comercio::class);
    }
}
