<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'id',
        'nombre',
        'abreviatura',
        'indicativo',
        'id_pais'
    ];

    public $incrementing = true;

    /**
     * Get the Pais associated with the Departamento.
     */
    public function pais()
    {
        return $this->hasOne(Pais::class,'id_pais','id');
    }

    /**
     * Get the Ciudad that owns the Departamento.
     */
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class,'id_ciudad');
    }

    /**
     * Get the Telefono that owns the Departamento.
     */
    public function telefono()
    {
        return $this->belongsTo(Telefono::class);
    }
}
