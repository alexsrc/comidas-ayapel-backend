<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(DomicilioEstadosSeeder::class);
        //$this->call(PaisesSeeder::class);
        //$this->call(DepartamentosSeeder::class);
        //$this->call(CiudadesSeeder::class);
        //$this->call(TelefonoTiposSeeder::class);
        //$this->call(ProductoEstadosSeeder::class);
        //$this->call(ComercioTiposSeeder::class);
        //$this->call(UsuarioEstadosSeeder::class);
        //$this->call(UsuarioTiposSeeder::class);
        $this->call(UsuariosSeeder::class);
    }
}
