<?php

use Laravel\Lumen\Routing\Router;
/** @var Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('login', ['as' => 'login', 'uses' => 'UserController@login']);

/*** v1 group */
$router->group(['prefix' => 'v1', 'as' => 'v1', 'middleware' => 'auth:api'], function () use ($router) {
    /*** Auth */
    $router->get('me', ['as' => 'me', 'uses' => 'UserController@me']);
    $router->post('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
    $router->post('refresh', ['as' => 'refresh', 'uses' => 'UserController@refresh']);
});
