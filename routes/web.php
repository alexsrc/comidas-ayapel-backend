<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/login', ['uses' => 'AuthController@authenticate']);
$router->post('/v1/register',  'UsuarioController@register');

$router->group(
    ['middleware' => 'jwt.auth'],
    function () use ($router) {
        $router->group(['prefix' => 'v1'], function () use ($router) {

            $router->get("/company/categories", "ComercioController@categoriesWithCompany");
            $router->post("/company/categories", "ComercioController@categoriesWithCompany");


            $router->post("/companies", "ComercioController@listCompanies");

            $router->get("/company/companies/{id}/{filter}", "ComercioController@listCompaniesByCategory");
            $router->post("/company/companies", "ComercioController@listCompaniesByCategory");

            $router->get("/company/products/{id}", "ComercioController@listProductByCompany");
            $router->post("/company/products/{id}", "ComercioController@listProductByCompany");


            $router->post("/order", "PedidoController@createOrder");
        });
    }
);
