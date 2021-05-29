<?php

use Illuminate\Support\Facades\Route;
use Laravel\Lumen\Routing\Router;

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

Route::get('/painel', 'PainelController@index');
Route::get('/paineladm', 'PainelAdministrativoController@index');
Route::get('/paineladm/analistas', 'AnalistasController@index');
Route::post('/paineladm/analistas/incluir', 'AnalistasController@store');
Route::get('/paineladm/analistas/editar', 'AnalistasController@editarAnalista');
Route::get('/paineladm/parametros', 'ParametrosController@index');
Route::post('/paineladm/parametros', 'ParametrosController@updateParametros');


$router->group(['prefix'=>'/api'], function() use($router) {
    $router->get('/painel', 'PainelController@getDadosPainel');
    $router->get('/ticketemanalise', 'RelatorioController@getTicketAnalise');
    $router->get('/parametrospainel', 'ParametrosPainelController@index');
});
