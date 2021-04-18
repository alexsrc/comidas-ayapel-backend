<?php

namespace Database\Seeders;

use App\Models\UsuarioEstado;
use Illuminate\Database\Seeder;

class UsuarioEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioEstados=[
            (object)["nombre"=>"Activo","descripcion"=>""],
            (object)["nombre"=>"Eliminado","descripcion"=>""],
            (object)["nombre"=>"Inactivo","descripcion"=>""],
        ];

        foreach ($usuarioEstados as $usuarioEstado){
            $usuarioEstadosModel                =   new UsuarioEstado();
            $usuarioEstadosModel->nombre        =   $usuarioEstado->nombre;
            $usuarioEstadosModel->descripcion   =   $usuarioEstado->descripcion;
            $usuarioEstadosModel->save();
        }
    }
}
