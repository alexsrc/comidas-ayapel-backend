<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\ComercioTipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ComercioController extends Controller
{
    public function categoriesWithCompany()
    {
        $categoriesWithCompany=ComercioTipo::Select("comercio_tipos.nombre as name","comercio_tipos.imagen as photo_url")
            ->selectRaw("count(comercios.id) as id")
            ->Join("comercios","comercios.id_comercio_tipo","comercio_tipos.id")
            ->groupBy("comercio_tipos.id")
            ->get();

        $data=[
            "status"            =>  true,
            "response_text"     =>  "lista de categorias comercio",
            "data"              =>  $categoriesWithCompany
        ];

        return $this->response($data,200);
    }
}
