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

//--use this package for notifications---https://www.laravelplay.com/packages/ciptohadi-web-id::lumen-notifications#installation

$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('notifications','NotificationController@index');
    $router->post('notifications','NotificationController@store');
    $router->get('notifications/{notification}','NotificationController@show');
    $router->put('notifications/{notification}','NotificationController@update');
    $router->patch('notifications/{notification}','NotificationController@update');
    $router->delete('notifications/{notification}','NotificationController@destroy');
    $router->delete('notifications/{notification}','NotificationController@destroy');
});