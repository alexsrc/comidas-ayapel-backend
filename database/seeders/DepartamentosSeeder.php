<?php

namespace Database\Seeders;

use App\Models\Departamento;
use App\Models\Pais;
use Illuminate\Database\Seeder;

class DepartamentosSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pais= Pais::where("nombre","Colombia")->first();
        $departamentos = json_decode(file_get_contents("https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json"));

        if($pais){
            foreach ($departamentos as $departamento){

                $depart = new Departamento();
                $depart->nombre         =   $departamento->departamento;
                $depart->abreviatura    =   substr($departamento->departamento,0,3);
                $depart->indicativo     =   1;
                $depart->id_pais        =   $pais->id;
                $depart->save();
            }

        }
    }
}
