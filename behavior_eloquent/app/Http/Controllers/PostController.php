<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        /** o first no final, pega sem o primeiro registro */
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo '<hr/>';


        // /** o firstOrFail ele redireciona para Page Not Found, caso não encontre o registro conforme a condição no where */
        // $post = Post::where('created_at', '>=', date('2051-m-d H:i:s'))->firstOrFail();
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo '<hr/>';


        // /** o find é buscado sempre pelo id do registro */
        // $post = Post::find(2);
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo '<hr/>';


        /** o findOrFail é buscado sempre pelo id do registro, e caso não exista é redirecionado para Page Not Found */
        // $post = Post::findOrFail(99);
        // echo "<h1>{$post->title}</h1>";
        // echo "<h2>{$post->subtitle}</h2>";
        // echo "<p>{$post->description}</p>";
        // echo '<hr/>';


        // /** o exists retorna um boolean se o registro existe ou não no banco de dados */
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->exists();
        // if ($post) {
        //     echo "<h1>O registro existe no banco</h1>";
        // } else {
        //     echo "<h1>O registro NÃO existe no banco</h1>";
        // }


        /** semelhante ao SQL, os comandos abaixo irão retornar um único dado conforme a sua função e uso
         * max : retorna o maior valor do registro ou ordem alfabética decrescente (string, int, decimal)
         * min : retorna o menor valor do registro ou ordem alfabética crescente (string, int, decimal)
         * sum : realiza a operação de soma sobre registros inteiros
         * avg : realiza a operação de média aritmética sobre os registros inteiros
         * count : conta a quantidade de registros
         */
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->max('title');
        // echo "<h1>Maior registro: $post</h1>";
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->min('title');
        // echo "<h1>Menor registro: $post</h1>";
        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->count('title');
        // echo "<h1>Qtd registro: $post</h1>";


        /** o all retorna todos os dados sem necessidade de informar uma condição */
        $posts = Post::all();

        /** o get retorna todos os dados conforme a condição
         * o take é semelhante ao limit do SQL
         * o orderBy é auto explicativo
         */
        // $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->take(2)->get();
        // foreach ($posts as $post) {
        //     echo "<h1>{$post->title}</h1>";
        //     echo "<h2>{$post->subtitle}</h2>";
        //     echo "<p>{$post->description}</p>";
        //     echo '<hr/>';
        // }

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        /** Method (i) (recomendado)
         * Utilizando o modelo de inserção Object -> Prop -> Save 
         */
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        /** Method (ii)
         * Deve passar os campos que foram permitidos no model, na variável $fillable
         */
        // Post::create(
        //     [
        //         'title' => $request->title,
        //         'subtitle' => $request->subtitle,
        //         'description' => $request->description
        //     ]
        // );

        /** Method (iii)
         * Esse método de inserção, realiza uma busca com base nos valores passados no primeiro parâmetro, caso encontre o registro ele atualza conforme os valores passados no segundo parâmetro, caso não encontre o registro no banco ele cria!
         * O primeiro parâmetro é um array que funciona como se fosse um WHERE, ou seja, no exemplo abaixo, ele buscará no banco o registro que possui o title igual a "formiga"; é permitido passar mais de uma "condição" também.
         * O segundo parâmetro é os dados a serem persistidos caso encontre ou não o registro.
         * Obs.: para persistir de fato os dados, deve-se utilizar o save() no final da definição.
         * DICA: caso, fique complicado o entendimento, execute duas vezes e analise os dados no banco em cada execução
         */
        // $post = Post::firstOrNew(
        //     [
        //         'title' => 'formiga'
        //     ],
        //     [
        //         'subtitle' => $request->subtitle.' (qualquer subtitle a mais)',
        //         'description' => $request->description.'(qualque description a mais)'
        //     ]
        // );
        // $post->save();

        /** Method (iv)
         * Esse método é semelhante ao de cima, porém ele não atualiza o registro caso já exista, ou seja, é somente para novo registro e também ele dispensa o uso do save() no final.
         */
        // Post::firstOrCreate(
        //     [
        //         'title' => 'foca'
        //     ],
        //     [
        //         'subtitle' => $request->subtitle.'2',
        //         'description' => $request->description.'(se executar conforme a condição não irá criar um novo registro e sim atualizar)'
        //     ]
        // );

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('posts.update', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {

        /** Method (i) (recomendado) */
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        /** Method (ii)
         * Esse método é semelhante ao firstOrNew de inserção de dados
         */
        // Post::updateOrCreate(
        //     [
        //         'id' => $post->id
        //     ],
        //     [
        //         'title' => $request->title,
        //         'subtitle' => $request->subtitle,
        //         'description' => $request->description
        //     ]
        // );

        /** Method (iii)
         * Caso deseje realizar uma atualização em massa, ou seja, para vários registros de uma vez. No exemplo abaixo, vou atualizar apenas a descrição de todos os registros cuja data é superior a hoje (20/08/2020)
         */
        // Post::where('created_at', '>=', date('Y-m-d H:i:s'))->update(['description' => $request->description]);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        /** Method (i) */
        // $post->delete();

        /** Method (ii) (recomendado) */
        Post::destroy($post->id);

        /** Method (iii) (exclusão em massa) */
        // Post::where('id', '>', $post->id)->delete();

        return redirect()->route('posts.index');
    }
}
