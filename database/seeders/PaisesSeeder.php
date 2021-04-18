<?php

namespace Database\Seeders;

use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises =   new Pais();
        $paises->nombre         =   "Colombia";
        $paises->indicativo     =   57;
        $paises->abreviatura    =   "Col";
        $paises->save();
    }
}
