<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Telefono;
use App\Models\TelefonoTipo;
use Illuminate\Database\Seeder;
use Faker;

class TelefonosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0;$i<30;$i++){
            $telefonos                  =   new Telefono();
            $telefonos->numero          =   $faker->phoneNumber;
            $telefonos->id_departamento =   (Departamento::where("nombre","Córdoba")->first())->id;
            $telefonos->id_telefono_tipo=   (TelefonoTipo::where("nombre","Celular")->first())->id;
            $telefonos->save();
        }
    }
}
