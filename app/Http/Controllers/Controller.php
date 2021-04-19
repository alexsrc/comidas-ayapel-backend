<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function response($data=[],$status){
        $response = new Response();
        $response->setContent(json_encode($data));
        $response->setStatusCode($status);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
