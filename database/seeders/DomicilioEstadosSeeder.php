<?php

namespace Database\Seeders;

use App\Models\DomicilioEstado;
use Illuminate\Database\Seeder;

class DomicilioEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $domicilioEstados=[
            "Pendiente",
            "Aceptado",
            "Entregado",
            "Cancelado",
            "No entregado",
            "Devuelto"
        ];

        foreach ($domicilioEstados as $domicilioEstado){
            $domicilioEstadosModel          =   new DomicilioEstado();
            $domicilioEstadosModel->nombre  =   $domicilioEstado;
            $domicilioEstadosModel->estado  =   1;
            $domicilioEstadosModel->save();
        }

    }
}
