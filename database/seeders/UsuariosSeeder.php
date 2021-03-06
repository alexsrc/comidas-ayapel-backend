<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Usuario;
use App\Models\UsuarioEstado;
use App\Models\UsuarioTipo;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0;$i<1;$i++){
            $usuario                    =   new Usuario();
            $usuario->nombres           =   $faker->firstName;
            $usuario->apellidos         =   $faker->lastName;
            $usuario->fecha_nacimiento  =   $faker->dateTimeBetween("-90 years","-12 years");
            $usuario->imagen            =   null;
            $usuario->celular           =   rand(3110000000,3239999999);
            $usuario->contrasena          =   Hash::make("123456",["rounds"=>12]);
            $usuario->id_usuario_tipo   =   (UsuarioTipo::where("nombre","Cliente")->first())->id;
            $usuario->id_ciudad         =   (Ciudad::where("nombre","Ayapel")->first())->id;
            $usuario->id_usuario_estado =   (UsuarioEstado::where("nombre","Activo")->first())->id;
            $usuario->save();
        }
    }
}
