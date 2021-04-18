<?php

namespace Database\Seeders;

use App\Models\TelefonoTipo;
use Illuminate\Database\Seeder;

class TelefonoTiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telefonoTipos=[
            "Fijo",
            "Celular"
        ];

        foreach ($telefonoTipos as $telefonoTipo){
            $tefonoTipoModel         =   new TelefonoTipo();
            $tefonoTipoModel->nombre   =   $telefonoTipo;
            $tefonoTipoModel->save();
        }
    }
}
