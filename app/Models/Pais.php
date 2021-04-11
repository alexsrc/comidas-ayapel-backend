<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'paises';

    protected $fillable = [
        'id',
        'nombre',
        'indicativo',
        'abreviatura'
    ];

    public $incrementing = true;

    /**
     * Get the Departamento that owns the Pais.
     */
    public function Departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
