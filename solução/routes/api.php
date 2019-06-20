<?php

use Illuminate\Http\Request;
use App\Http\Middleware\AuthHandler;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO: Aplicar filtro de parametro nas rotas

Route::resource('/clientes', 'ClientesController');


Route::middleware(AuthHandler::class)->resource('/eventos', 'EventosController');
Route::middleware(AuthHandler::class)->get('/eventos/cidades/{cidade}', 'EventosController@getByCityName');
Route::middleware(AuthHandler::class)->get('/eventos/categorias/{categoria}', 'EventosController@getByCategory');
Route::middleware(AuthHandler::class)->get('/eventos/datas/{data}', 'EventosController@getByDate');


Route::middleware(AuthHandler::class)->resource('/ingressos', 'IngressosController');



Route::middleware(AuthHandler::class)->get('/ingressos/cidades/{cidade}', 'IngressosController@getByCityName');


Route::middleware(AuthHandler::class)->get('/ingressos/categorias/{categoria}', 'IngressosController@getByCategory');
Route::middleware(AuthHandler::class)->get('/ingressos/datas/{data}', 'IngressosController@getByDate');


/* cadastro de usuario */

Route::post('/users/register', 'UsersController@store');


/* jwt */
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::middleware(AuthHandler::class)->post('logout', 'AuthController@logout');
    Route::middleware(AuthHandler::class)->post('refresh', 'AuthController@refresh');
    Route::middleware(AuthHandler::class)->post('me', 'AuthController@me');

});