<?php

namespace App\Http\Controllers;


use App\Models\Ciudad;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller
{
    public $request;


    /**
     * Create a new controller instance.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function register(Request $request){
        $data=$request->all();
        $name=$data["name"];
        $lastname=$data["lastname"];
        $cellphone=$data["cellphone"];
        $password=$data["password"];
        $confirmPassword=$data["confirmPassword"];


        $errorField=[];

        if(!$this->validateField($name))array_push($errorField,"El campo nombre es obligatorio");
        if(!$this->validateField($lastname))array_push($errorField,"El campo apellido es obligatorio");
        if(!$this->validateField($cellphone))array_push($errorField,"El campo celulares es obligatorio");
        if(!$this->validateField($password))array_push($errorField,"El campo contraseña es obligatorio");
        if(!$this->validateField($confirmPassword))array_push($errorField,"El campo confirmación contraseña es obligatorio");

        if($this->validateField($password) && $confirmPassword!==$password)array_push($errorField,"Los campos contraseña y confirmación contraseña no son iguales");

        $usuarioValidate=Usuario::where("celular",$cellphone)->first();
        if($usuarioValidate)array_push($errorField,"Ya existe una cuenta con este numero");

        if(count($errorField)>0) {
            return $this->response([
                "status"            =>  false,
                "response_text"     =>  "Registro",
                "data"              =>  $errorField
            ],200);
        }



        $ciudad= Ciudad::where("nombre","Ayapel")->first();

        $usuario=new Usuario();
        $usuario->nombres=$name;
        $usuario->apellidos=$lastname;
        $usuario->celular=$cellphone;
        $usuario->id_usuario_tipo=2;
        $usuario->id_ciudad=$ciudad->id;
        $usuario->fecha_nacimiento=new \DateTime("1969-12-31 23:59:59");
        $usuario->id_usuario_estado=1;
        $usuario->contrasena=Hash::make($confirmPassword,["rounds"=>12]);
        $usuario->save();

        return $this->response([
            "status"            =>  true,
            "response_text"     =>  "Registro",
            "data"              =>  []
        ],200);
    }
}
