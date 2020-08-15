<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/**
 * Utilizando o resource com API. O sintaxe e regras são bem semelhantes. A diferença está na chamada do método, agora apiResource, e na criação do controller, agora php artisan make:controller API\\NameController --api
 * Assim, é criado exatamente os mesmo métodos do resource, só que dentro da web temos duas rotas que são criadas para exibir o formulário (create e update), como aqui dentro não é necessário essas rotas, logo não faz a criação
 * 
 * Route::apiResource('BASE_URI', 'API\Controller');
 * 
 */
// Route::apiResource('users', 'API\UserController');