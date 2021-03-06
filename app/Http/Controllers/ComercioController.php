<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\ComercioTipo;
use App\Models\ProductoComercio;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    public function categoriesWithCompany()
    {
        $categoriesWithCompany=ComercioTipo::Select("comercio_tipos.id as key","comercio_tipos.nombre as name","comercio_tipos.imagen as photo_url")
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

    public function listCompanies(Request $request){
        $data=$request->all();
        $filter=$data["filter"];
        $listCompaniesByCategory=Comercio::select("comercios.id as key","comercios.nombre as name","comercios.imagen as photo_url")
            ->selectRaw("count(producto_comercios.id) as id")
            ->LeftJoin("producto_comercios","producto_comercios.id_comercio","comercios.id")
            ->groupBy("comercios.id");
        if($filter!=""){
            $listCompaniesByCategory=$listCompaniesByCategory->where("comercios.nombre","like","%$filter%");
        }
        $listCompaniesByCategory=$listCompaniesByCategory->paginate(10);;

        $data=[
            "status"            =>  true,
            "response_text"     =>  "lista de comercios por tipo",
            "data"              =>  $listCompaniesByCategory
        ];

        return $this->response($data,200);
    }

    public function listCompaniesByCategory(Request $request){
        $data=$request->all();
        $id=$data["id"];
        $filter=$data["filter"];
        $listCompaniesByCategory=Comercio::select("comercios.id as key","comercios.nombre as name","comercios.imagen as photo_url")
            ->selectRaw("count(producto_comercios.id) as id")
            ->LeftJoin("producto_comercios","producto_comercios.id_comercio","comercios.id")
            ->groupBy("comercios.id")
            ->where("comercios.id_comercio_tipo",$id);
        if($filter!=""){
            $listCompaniesByCategory=$listCompaniesByCategory->where("comercios.nombre","like","%$filter%");
        }
        $listCompaniesByCategory=$listCompaniesByCategory->get();

        $data=[
            "status"            =>  true,
            "response_text"     =>  "lista de comercios por tipo",
            "data"              =>  $listCompaniesByCategory
        ];

        return $this->response($data,200);
    }

    public function listProductByCompany(Request $request){
        $data=$request->all();
        $id=$data["id"];
        $filter=$data["filter"];
        $listProductByCompany=ProductoComercio::select(
            "producto_comercios.id as key",
            "productos.nombre as name",
            "productos.imagen as photo_url",
            "productos.descripcion as description",
            "producto_comercios.valor as amount"
        )
            ->Join("productos","producto_comercios.id_producto","productos.id")
            ->Join("comercios","comercios.id","producto_comercios.id_comercio")
            ->where("comercios.id",$id)
            ->where("productos.id_producto_estado",1);

        if($filter!=""){
            $listProductByCompany=$listProductByCompany->where("productos.nombre","like","%$filter%");
        }
        $listProductByCompany=$listProductByCompany->paginate(10);

        $data=[
            "status"            =>  true,
            "response_text"     =>  "lista de productos por comercio",
            "data"              =>  $listProductByCompany
        ];

        return $this->response($data,200);
    }

    public function register(Request $request){
        $data=$request->all();
        $name=$data["name"];
        $lastname=$data["lastname"];
        $cellphone=$data["cellphone"];
        $password=$data["password"];
        $confirmPassword=$data["confirmPassword"];


        $errorField=[];

        if(!$this->validate($name))array_push($errorField,"El campo nombre es obligatorio");
        if(!$this->validate($lastname))array_push($errorField,"El campo apellido es obligatorio");
        if(!$this->validate($cellphone))array_push($errorField,"El campo celulares es obligatorio");
        if(!$this->validate($password))array_push($errorField,"El campo contrase??a es obligatorio");
        if(!$this->validate($confirmPassword))array_push($errorField,"El campo confirmaci??n contrase??a es obligatorio");

        if(count($errorField)>0) {
            return $this->response([
                "status"            =>  false,
                "response_text"     =>  "Registro",
                "data"              =>  $errorField
            ],200);
        }

        if($this->validate($password) && $confirmPassword!==$password)array_push($errorField,"Los campos contrase??a y confirmaci??n contrase??a no son iguales");

        $usuario=new Usuario();
        $usuario->nombres=$name;
        $usuario->apellidos=$lastname;
        $usuario->celular=$cellphone;
        $usuario->id_usuario_tipo=2;
        $usuario->contrasena=Hask::make($confirmPassword,["rounds"=>12]);
        $usuario->save();

        return $this->response([
            "status"            =>  true,
            "response_text"     =>  "Registro",
            "data"              =>  []
        ],200);
    }

}
