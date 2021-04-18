<?php

namespace Database\Seeders;

use App\Models\UsuarioTipo;
use Illuminate\Database\Seeder;

class UsuarioTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarioTipos=[
            "Gerente",
            "Cliente"
        ];

        foreach ($usuarioTipos as $usuarioTipo){
            $usuarioTiposModel                =   new UsuarioTipo();
            $usuarioTiposModel->nombre        =   $usuarioTipo;
            $usuarioTiposModel->save();
        }
    }
}
