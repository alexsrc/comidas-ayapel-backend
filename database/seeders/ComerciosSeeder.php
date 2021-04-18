<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Comercio;
use App\Models\ComercioEstado;
use App\Models\ComercioTipo;
use App\Models\Telefono;
use App\Models\Usuario;
use App\Models\UsuarioEstado;
use App\Models\UsuarioTipo;
use Illuminate\Database\Seeder;
use Faker;

class ComerciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $telefonos  =   Telefono::all();
        $comercioTipos=[
            "Restaurantes",
            "Licores",
            "Mascotas",
            "Supermercados",
            "Farmacia",
            "Moda",
            "Tecnologia",
            "Hogar",
            "Deportes",
            "Jugueteria",
            "Floristeria",
            "Bebes"
        ];

        $usuarioTipo=(UsuarioTipo::where("nombre","Gerente")->first())->id;
        $ciudad=(Ciudad::where("nombre","Ayapel")->first())->id;
        $usuarioEstado=(UsuarioEstado::where("nombre","Activo")->first())->id;

        $comercioEstado=(ComercioEstado::where("nombre","Activo")->first())->id;
        for($i=0;$i<30;$i++){
            $usuario                    =   new Usuario();
            $usuario->nombres           =   $faker->firstName;
            $usuario->apellidos         =   $faker->lastName;
            $usuario->fecha_nacimiento  =   $faker->dateTimeBetween("-90 years","-12 years");
            $usuario->imagen            =   null;
            $usuario->id_usuario_tipo   =   $usuarioTipo;
            $usuario->id_ciudad         =   $ciudad;
            $usuario->id_usuario_estado =   $usuarioEstado;
            $usuario->save();

            $comercios                      =   new Comercio();
            $comercios->nombre              =   $faker->company;
            $comercios->razon_social        =   $comercios->nombre;
            $comercios->direccion           =   $faker->streetAddress;
            $comercios->imagen              =   $faker->imageUrl(640,480,"cats");
            $comercios->id_ciudad           =   $usuario->id_ciudad;
            $comercios->id_comercio_estado  =   $comercioEstado;
            $comercios->id_comercio_tipo    =   (ComercioTipo::where("nombre",$comercioTipos[rand(0,11)])->first())->id;
            $comercios->id_propietario      =   $usuario->id;
            $comercios->id_telefono         =   $telefonos[$i]->id;
            $comercios->save();
        }
    }
}
