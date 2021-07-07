<?php


namespace App\Http\Controllers;


use App\Models\Ciudad;
use App\Models\Comercio;
use App\Models\Domicilio;
use App\Models\DomicilioDetalle;
use App\Models\Producto;
use App\Models\ProductoComercio;
use App\Models\Telefono;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function createOrder(Request $request){
        $data=$request->all();
        $arrayProducts=$data["arrayProducts"];

        $address=$data["address"];
        $description=$data["description"];
        $latitude=$data["latitude"];
        $longitude=$data["longitude"];
        $addressDescription=$data["addressDescription"];
        $usuarioId=$data["usuarioId"];

        if(!$this->validateField($arrayProducts))array_push($errorField,"El campo arrayProducts es obligatorio");
        if(!$this->validateField($address))array_push($errorField,"El campo address es obligatorio");
        if(!$this->validateField($latitude))array_push($errorField,"El campo latitude es obligatorio");
        if(!$this->validateField($longitude))array_push($errorField,"El campo longitude es obligatorio");
        if(!$this->validateField($addressDescription))array_push($errorField,"El campo addressDescription es obligatorio");
        if(!$this->validateField($usuarioId))array_push($errorField,"El campo usuarioId es obligatorio");



        if(count($arrayProducts)>0){
            $comercio=Comercio::Join("producto_comercios","producto_comercios.id_comercio","comercios.id")
                ->where("producto_comercios.id",$arrayProducts[0]->id)->first();

            if(!$comercio || $comercio->id_comercio_estado!==1){
                array_push($errorField,"El comercio no esta disponible");
            }
            $valortotal=0;
            foreach ($arrayProducts as $arrayProduct){
                $productComercio=ProductoComercio::where("id",$arrayProduct->id)->first();
                if(!$productComercio || $productComercio->id_producto_estado!==1){
                    array_push($errorField,"El producto no esta disponible");
                    break;
                }

                $product=Producto::find($productComercio->id_producto);
                $textPedido.="Producto: {$product->nombre}, Cantidad: {$arrayProduct->quantity}, valor: {$arrayProduct->amount}, Descripción: {$arrayProduct->description}
                ";
                $valortotal+=$arrayProduct->amount;
            }

            $textPedido.="Valor total: {$valortotal}";
        }

        $usuario=Usuario::find($usuarioId);

        if(!$usuario || $usuario->id_usuario_estado!==1)array_push($errorField,"El usuario no esta existe o esta inactivo");


        if(count($errorField)>0) {
            return $this->response([
                "status"            =>  false,
                "response_text"     =>  "Create Order",
                "data"              =>  $errorField
            ],200);
        }

        $city=Ciudad::where("nombre","Ayapel")->first();

        $domicilio = new Domicilio();
        $domicilio->direccion=$address;
        $domicilio->descripcion=$description;
        $domicilio->latitud=$latitude;
        $domicilio->longitud=$longitude;
        $domicilio->celular=$usuario->celular;
        $domicilio->nombres= $usuario->nombres." ".$usuario->apellidos;
        $domicilio->fecha_creacion=new \DateTime("now");
        $domicilio->id_domicilio_estado=7;
        $domicilio->ciudad=$city->id;
        $domicilio->save();


        foreach ($arrayProducts as $arrayProduct){
            $domicilioDetalle = new DomicilioDetalle();
            $domicilioDetalle->id_producto=$arrayProduct->id;
            $domicilioDetalle->cantidad=$arrayProduct->quantity;
            $domicilioDetalle->valor=$arrayProduct->amount;
            $domicilioDetalle->valor_total=$arrayProduct->totalAmount;
            $domicilioDetalle->id_domicilio_detalle_estado=1;
            $domicilioDetalle->save();
        }



        $celularComercio=Telefono::find($comercio->id_telefono);

        $whatsapp='whatsapp://send?text=' . $textPedido . '&phone=57' + $celularComercio->numero;

        return $this->response([
            "status"            =>  true,
            "response_text"     =>  "Creación de pedido",
            "data"              =>  ["urlWhatsapp"=>$whatsapp]
        ],200);
    }
}
