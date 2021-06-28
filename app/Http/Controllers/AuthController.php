<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
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

    public function authenticate()
    {
        try{
            $header = $this->request->header('Authorization', '');
            $cellphone = "";
            $password = "";


            if (Str::startsWith($header, 'Basic ')) {

                $login = explode(":", base64_decode(Str::substr($header, 6)));
                $cellphone = $login[0];
                $password = $login[1];
            }

            if ($cellphone == "") {
                return response()->json([
                    'error' => 'cellphone is required.'
                ], 400);
            }
            if ($password == "") {
                return response()->json([
                    'error' => 'password is required.'
                ], 400);
            }


            // Find the user by email

            $usuario=Usuario::where("celular",$cellphone)->first();

            if($usuario){
                $validatePassword=Hash::check($password,$usuario->contrasena);
            }


            $token="";
            $status=200;
            if($usuario && $validatePassword){
                $token=$this->jwt($usuario);
                $data=[
                    "status"            =>  true,
                    "response_text"     =>  "autenticación éxitosa",
                    "data"              =>  ["token"=>$token]
                ];
            }else{
                $status=401;
                $data=[
                    "status"            =>  false,
                    "response_text"     =>  "autenticación fallida",
                    "data"              =>  []
                ];
            }

            return $this->response($data,$status);

        }catch (\Exception $exception){
            return response()->json([
                'error' => 'Invalid credentials.',
                "excepcion"=>$exception->getMessage()
            ], 400);
        }
    }


    /**
     * Create a new token.
     *
     * @param Usuario $user
     * @return string
     */
    protected function jwt(Usuario $user)
    {

        $payload = [
            'iss' => "comidasAyapelJWT", // Issuer of the token
            'sub' => $user, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60 * 60, // Expiration time
            'rand'=>  md5(microtime()).rand(0,1000000)
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }
}
