<?php

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Router;
/** @var Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('login', ['uses' => 'UserController@login']);

/*** v1 group */
$router->group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () use ($router) {
    /*** Auth */
    $router->get('me', ['uses' => 'UserController@me']);
    $router->post('logout', ['uses' => 'UserController@logout']);
    $router->post('refresh', ['uses' => 'UserController@refresh']);

    $router->group(['prefix' => 'orders'], function () use ($router) {
        $router->post('/', ['uses' => 'OrderController@create']);
    });
});

$router->group(['prefix' => 'portwallet'], function () use ($router) {
    $router->get('/', function (Request $request) use ($router) {
        response()->json(['message' => 'success']);
    });

    $router->post('/ipn', ['uses' => 'IpnHandlerController']);
});
