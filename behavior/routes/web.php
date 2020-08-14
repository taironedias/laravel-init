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

/**
 * (vii)
 */
// Route::resourceVerbs([
//     'create' => 'cadastro',
//     'edit' => 'editar'
// ]);


Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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
    * MATCH: Disponível no Laravel para agrupar rotas que possem o mesmo URI e compartilham o mesmo controller
 *
 *          Route::match(['method_1', 'method_2'...], 'URI', 'Controller@method');
 * 
 * DELETE:  Utilizado para remover um recurso.
 *          Tem o mesmo funcionamento do PUT, PATCH no quesito do Form Method Spoofing, nesse caso, @method('DELETE')
 * 
 *          Route::match('URI', 'Controller@method');
 * 
    * ANY:   Disponível no Laravel para aceitar qualqer verbalização
 *
 *          Route::any('URI', 'Controller@method');
 * 
 * 
 * Passos a passo: Definir Rota > Criar Controller > Criar Método > Configurar a View
 */

/**
 * GET
 */
// Route::get('/users/1', 'UserController@index');
// Route::get('/getData', 'UserController@getData');

/**
 * POST
 */
// Route::post('postData', 'UserController@postData');

/**
 * PUT
 */
// Route::put('/users/1', 'UserController@putData');

/**
 * PATCH
 */
// Route::patch('/users/1', 'UserController@patchData');


/**
 * MATCH USING PUT/PATCH
 */
// Route::match(['put', 'patch'], '/users/2', 'UserController@matchData');

/**
 * DELETE
 */
// Route::delete('/users/1', 'UserController@destroy');

/**
 * ANY
 */
// Route::any('/users', 'UserController@any');


/**
 * Route::resource('BASE_URI', 'Controller');
 * 
 * Nesse caso, utilizando o resource não é necessário criar manualmente cada rota. Se combinado com a instrução 'php artisan make:controller NameController --resource', o Laravel já cria o todos os métodos necessários e faz o bind para cada rota, como na instrução (i)
 * 
 * 
 * Se desejar criar uma rota que não seja criada automaticamente pelo resource, é interessane adicionar a rota antes da instrução Route::resource, como na instrução (ii)
 * 
 * Se desejar sobrescrever alguma rota que já existe no resource, deve ser adicionada depois da instrução Route::resource, como na instrução (iii)
 * 
 * 
 * Se desejar ter rotas específicas para que o resource implemente, basta utilizar o método only passando um array com as rotas desejadas, como na instrução (iv)
 * 
 * 
 * Se desejar ter todas as rotas implementadas pelo resource e não querer apenas uma ou algumas, basta utilizar o método except passando um array com as rotas a serem desconsideradas, como na instrução (v)
 * 
 * Se desejar alterar o nome padrão da rota, por exemplo edit para editar ou create para cadastro, basta no início desse arquivo de rotas, utilizar a função resourceVerbs e a cada chave existente, sobrescrever pela desejada, como na instrução (vi)
 * Obs.1: É importante que todas os outros recursos obtenham o mesmo padrão de rotas para facilitar a manutenibilidade, por esse motivo que é recomendado adicionar essa instrução no início desse arquivo. E para API, não é recomendado esse uso!
 * Obs.2: É alterado apenas o nome da rota, o nome das funções permanece a default.
 */

/**
 * (ii)
 */
// Route::get('/posts/premium', 'PostController@premium');

/**
 * (i)
 */
// Route::resource('posts', 'PostController');

/**
 * (iv)
 */
// Route::resource('posts', 'PostController')->only(['index', 'show']);

/**
 * (v)
 */
// Route::resource('posts', 'PostController')->except(['index', 'show']);

/**
 * (iii)
 */
// Route::get('/posts', 'PostController@indexSobrescrito');


/** =============================================== */
/**
 * TIPOS DE CHAMADA : Além da tradicional utilizada nos exemplos acima, temos as seguintes
 * 
 * (i) Utilizando Closure: é criado uma função anônima com instruções para ser executada assim que a rota é chamada.
 * 
 * (ii) View: normalmente é utilizando apenas para exibir uma página sem intereção do usuário. De acordo com uma específicação de url (GET), é retornada uma visão de dentro de resource/views no formato .blade
 * 
 * (iii) Fallback: quando o framework não consegue resolver uma rota, será encaminhado para a rota de fallback. Ambiente ideal para implementar a página 404 do sistema. Pode utilizar tanto um Closure ou Controller para renderizar a página 404.
 * 
 * (iv) Redirect: Para criar um redirecionamento, você deve informar qual a URI acessada, para onde deve ser redirecionada a requisição e qual o código HTTP (normalmente utiliza-se 301 que é o padrão para redirecionamento).
 * 
 * (v) Nomeação: Ao implementar o nome nas rotas os controladores ficam desacoplados de rotas fixas. Você passa a ter uma maior flexibilidade e tem um desenvolvimento mais ágil e padronizado. Assim, o interessante de definir um name é que o redirect (lá dentro do controller) pode ser feito com esse name em vez de explicitar o caminho da url. O name de cada rota pode ser visualizado no comando php artisan route:list. 
 * 
 */

 /**
  * (i)
  */
//  Route::get('/users', function() {
//      echo "<h2>Listagem dos usuários utilizando Closure!</h2>";
//  });

/**
 * (ii)
 */
// Route::view('/formulario', 'form');

/**
 * (iii)
 */
// Route::fallback('UserController@pageNotFound');

/**
 * (iv)
 */
// Route::redirect('/users/add', url('/form'), 301);

/**
 * (v)
 */
// Route::get('/posts', 'PostController@index')->name('posts.index');
// Route::get('/posts/redir', 'PostController@indexRedirect')->name('posts.indexRedirect');




/** =============================================== */
/**
 * TRATAMENTO DE PARÂMETROS
 * 
 * (i) Passando parâmetros (todos obrigatórios) e recuperando no Closure: para declarar como parâmetro deve-se colocar entre as chaves
 * 
 * (ii) Passando parâmetros (obrigatório/opcional) e recuperando no Closure: para declarar como opcional deve-se adicionar a interrogação ao final do nome do parâmetro
 * 
 * (iii) Tratando com regex um único parâmetro: adicionar o where no final da função get()
 * 
 * (iv) Tratando com regex vários parâmetros: adicionar dentro do where um array com key-value para cada parâmetro
 * 
 * (v) Passando parâmetros para o método no controlador
 * 
 */

/**
 * (i)
 */
// Route::get('/users/{id}/comments/{comment}', function($id, $comment) {
//     var_dump($id);
//     var_dump($comment);
// });

/**
 * (ii)
 */
// Route::get('/users/{id}/comments/{comment?}', function($id, $comment = null) {
//     var_dump($id);
//     var_dump($comment);
// });

/**
 * (iii)
 */
// Route::get('/users/{id}/comments/{comment?}', function($id, $comment = null) {
//     var_dump($id);
//     var_dump($comment);
// })->where('id', '[0-9]+');

/**
 * (iv)
 */
// Route::get('/users/{id}/comments/{comment?}', function($id, $comment = null) {
//     var_dump($id);
//     var_dump($comment);
// })->where(
//     [
//         'id' => '[0-9]+',
//         'comment' => '[0-9]+'
//     ]
// );

/**
 * (v)
 */
Route::get('/users/{id}/comments/{comment?}', 'UserController@userComment')->where(
    [
        'id' => '[0-9]+',
        'comment' => '[0-9]+'
    ]
);