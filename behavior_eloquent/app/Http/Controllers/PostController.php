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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post) {
        //
    }
}