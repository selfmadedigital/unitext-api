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

$router->group(['middleware' => 'jwt.auth','prefix' => 'api'], function() use ($router) {
  $router->get('contact',  ['uses' => 'ContactController@getContacts']);
  $router->put('contact/{id}', ['uses' => 'ContactController@update']);

  $router->get('content',  ['uses' => 'ContentController@getContent']);
  $router->put('content/{id}', ['uses' => 'ContentController@update']);

  $router->get('menu',  ['uses' => 'MenuController@getMenu']);
  $router->put('menu/{id}', ['uses' => 'MenuController@update']);

  $router->get('partner',  ['uses' => 'PartnerController@getPartners']);
  $router->put('partner/{id}', ['uses' => 'PartnerController@update']);
  $router->post('partner',  ['uses' => 'PartnerController@create']);
  $router->delete('partner',  ['uses' => 'PartnerController@delete']);

  $router->get('price',  ['uses' => 'PriceController@getPrices']);
  $router->put('price/{id}', ['uses' => 'PriceController@update']);

  $router->get('review',  ['uses' => 'ReviewController@getReviews']);
  $router->put('review/{id}', ['uses' => 'ReviewController@update']);
  $router->post('review',  ['uses' => 'ReviewController@create']);

  $router->get('service',  ['uses' => 'ServiceController@getServices']);
  $router->put('service/{id}', ['uses' => 'ServiceController@update']);

  $router->post('upload',  ['uses' => 'UploadController@upload']);
});

$router->post('auth/login', ['uses' => 'AuthController@authenticate']);
$router->put('auth/password', ['middleware' => 'jwt.auth', 'uses' => 'AuthController@updatePassword']);