<?php

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Router;
/** @var Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('portwallet', function (Request $request) use ($router) {
    dd($request);
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
