<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/form', 'form');

/**
 * Definição de Rota
 * Route::verbo_http('URI, 'Controller@method');
 * 
 * verbo_http = GET, POST, PUT, PATCH, DELETE, OPTIONS
 * 
 * GET: Utilizado para obter dados do servidor e não altera o estado do recurso.
 *      Neste exempo, quando o formulário foi disparado, os dados ficam presente na URI.
 *
 *      Route::get('URI', 'Controller@method');
 * 
 * POST:    Utilizado para criação de recurso ou envio de dados ao servidor para validação.
 *          Os dados ficam no corpo da requisição e não na URI.
 * 
 *          Route::post('URI', 'Controller@method');
 * 
 * PUT: Utilizado para atualização de todo o recurso. O caminho da requisição deve conter o objeto a ser atualizado juntamente com todos os parâmetros do objeto para que possa ser feita a ação com sucesso.
 *      Deve-se usar o Form Method Spoofing (falsificação do verbo), ou seja, lá na view dentro do <form> utilizar: @method('PUT')
 * 
 *      Route::put('URI', 'Controller@method');
 * 
 * PATCH:   Utilizado para atualização de parte ou de apenas um campo do recurso. Tem o mesmo funcionamento do PUT.
 *          Também trabalha com Form Method Spoofing, nesse caso, @method('PATCH')
 * 
 *          Route::patch('URI', 'Controller@method');
 * 
 * > MATCH: Disponível no Laravel para agrupar rotas que possem o mesmo URI e compartilham o mesmo controller
 *
 *          Route::match(['method_1', 'method_2'...], 'URI', 'Controller@method');
 * 
 * DELETE:  Utilizado para remover um recurso.
 *          Tem o mesmo funcionamento do PUT, PATCH no quesito do Form Method Spoofing, nesse caso, @method('DELETE')
 * 
 *          Route::match('URI', 'Controller@method');
 * 
 * > ANY:   Disponível no Laravel para aceitar qualqer verbalização
 *
 *          Route::any('URI', 'Controller@method');
 * 
 * 
 * Passos a passo: Definir Rota > Criar Controller > Criar Método > Configurar a View
 */

/**
 * GET
 */
Route::get('/users/1', 'UserController@index');
Route::get('/getData', 'UserController@getData');

/**
 * POST
 */
Route::post('postData', 'UserController@postData');

/**
 * PUT
 */
Route::put('/users/1', 'UserController@putData');

/**
 * PATCH
 */
Route::patch('/users/1', 'UserController@patchData');


/**
 * MATCH USING PUT/PATCH
 */
Route::match(['put', 'patch'], '/users/2', 'UserController@matchData');

/**
 * DELETE
 */
Route::delete('/users/1', 'UserController@destroy');

/**
 * ANY
 */
Route::any('/users', 'UserController@any');