<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    protected $fillable = [
        'id',
        'nombre',
        'id_departamento'
    ];

    public $incrementing = true;

    /**
     * Get the Departamento associated with the Ciudad.
     */
    public function departamento()
    {
        return $this->hasOne(Departamento::class,'id_departamento','id');
    }

    /**
     * Get the Comercio that owns the Ciudad.
     */
    public function comercio()
    {
        return $this->belongsTo(Comercio::class,'id_ciudad');
    }

    /**
     * Get the Domicilio that owns the Ciudad.
     */
    public function domicilio()
    {
        return $this->belongsTo(Ciudad::class,'id_ciudad');
    }
}
