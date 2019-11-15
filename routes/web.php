<?php

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

$router->group(['prefix' => 'api/agendamento'], function() use ($router){
    $router->get('/consultar/{dia}', 'AgendamentoController@listarDia');
    $router->post('/agendar', 'AgendamentoController@agendar');
    $router->get('/desmarcar/{id}', 'AgendamentoController@desmarcar');
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
