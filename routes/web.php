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

$router->get("/v1/company/categories","ComercioController@categoriesWithCompany");
$router->post("/v1/company/categories","ComercioController@categoriesWithCompany");


$router->get("/v1/company/companies/{id}","ComercioController@listWithCompaniesByCategory");
$router->post("/v1/company/companies/{id}","ComercioController@listWithCompaniesByCategory");
