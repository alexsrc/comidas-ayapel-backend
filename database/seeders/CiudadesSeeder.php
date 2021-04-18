<?php

namespace Database\Seeders;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departamentos = json_decode(file_get_contents("https://raw.githubusercontent.com/marcovega/colombia-json/master/colombia.min.json"));

        foreach ($departamentos as $departamento){
            $depart = Departamento::where("nombre",$departamento->departamento)->first();
            foreach ($departamento->ciudades as $ciudad){
                $ciudades =    new Ciudad();
                $ciudades->id_departamento = $depart->id;
                $ciudades->nombre = $ciudad;
                $ciudades->save();
            }
        }
    }
}
