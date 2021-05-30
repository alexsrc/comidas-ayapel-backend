<?php

namespace Database\Seeders;

use App\Models\ComercioTipo;
use Illuminate\Database\Seeder;
use Faker;

class ComercioTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
        $faker = Faker\Factory::create();

        foreach ($comercioTipos as $comercioTipo){
            $comercioTipoModel          =    new ComercioTipo();
            $comercioTipoModel->nombre  =   $comercioTipo;
            $comercioTipoModel->imagen  =   $faker->imageUrl(640,480,$comercioTipo);
            $comercioTipoModel->save();
        }
    }
}
