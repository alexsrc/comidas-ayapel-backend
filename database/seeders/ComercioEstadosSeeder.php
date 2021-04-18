<?php

namespace Database\Seeders;

use App\Models\ComercioEstado;
use Illuminate\Database\Seeder;

class ComercioEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comercioEstados=[
            (object)["nombre"=>"Activo","descripcion"=>""],
            (object)["nombre"=>"Eliminado","descripcion"=>""],
            (object)["nombre"=>"Inactivo","descripcion"=>""],
        ];

        foreach ($comercioEstados as $comercioEstado){
            $comercioEstadosModel                =   new ComercioEstado();
            $comercioEstadosModel->nombre        =   $comercioEstado->nombre;
            $comercioEstadosModel->descripcion   =   $comercioEstado->descripcion;
            $comercioEstadosModel->save();
        }
    }
}
