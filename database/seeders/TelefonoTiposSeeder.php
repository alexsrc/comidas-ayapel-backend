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
        $tefonoTipo         =   new TelefonoTipo();
        $tefonoTipo->name   =   "Fijo";
        $tefonoTipo->save();

        $tefonoTipo         =   new TelefonoTipo();
        $tefonoTipo->name   =   "Celular";
        $tefonoTipo->save();
    }
}
