<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';

    protected $fillable = [
        'id',
        'numero',
        'id_departamento',
        'id_telefono_tipo'
    ];

    /**
     * Get the Departamento associated with the Telefono.
     */
    public function departamento()
    {
        return $this->hasOne(Departamento::class,'id_departamento','id');
    }

    /**
     * Get the TelefonoTipo associated with the Telefono.
     */
    public function telefonoTipo()
    {
        return $this->hasOne(TelefonoTipo::class,'id_telefono_tipo','id');
    }

    /**
     * Get the Comercio that owns the Telefono.
     */
    public function Comercio()
    {
        return $this->belongsTo(Comercio::class);
    }
}
