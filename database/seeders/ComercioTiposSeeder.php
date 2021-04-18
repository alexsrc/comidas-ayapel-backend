<?php

namespace Database\Seeders;

use App\Models\ComercioTipo;
use Illuminate\Database\Seeder;

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

        foreach ($comercioTipos as $comercioTipo){
            $comercioTipoModel          =    new ComercioTipo();
            $comercioTipoModel->nombre  =   $comercioTipo;
            $comercioTipoModel->save();
        }
    }
}
