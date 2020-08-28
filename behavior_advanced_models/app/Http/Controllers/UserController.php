<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);

        echo "<h1>Dados do Usuário</h1>";
        echo "Nome: {$user->name}<br>";
        echo "E-mail: {$user->email}<br>";
        
        $userAddress = $user->addressDelivery()->get()->first();
        
        if (!empty($userAddress)) {
            echo "<h1>Endereço de Entrega</h1>";
            echo "Endereço: {$userAddress->address}, {$userAddress->number}<br>";
            echo "Complemento: {$userAddress->complement}<br>";
            echo "Cidade: {$userAddress->city} - {$userAddress->state}<br>";
            echo "CEP: {$userAddress->zipcode}<br>";
        }

        /* (i) salvando informações que contém um relacionamento */
        // $address0 = new Address([
        //     'address' => 'Rua A',
        //     'number' => '200',
        //     'complement' => 'Casa',
        //     'zipcode' => '12345-000',
        //     'city' => 'Cruz',
        //     'state' => 'BA'
        // ]);

        // $user->addressDelivery()->save($address0);

        /* (ii) */
        // $address1 = new Address();
        // $address1->address = 'Rua B';
        // $address1->number = '201';
        // $address1->complement = 'Apto';
        // $address1->zipcode = '12345-001';
        // $address1->city = 'Cruz das Almas';
        // $address1->state = 'Bahia';

        // $user->addressDelivery()->save($address1);
        
         /* (iii) utilizando para salvamento múltiplo */
        // $user->addressDelivery()->saveMany([$address0, $address1]);

        /* (iv) essa é uma outra forma, porém deve-se ficar atento pois se tiver alguma campo possuir um tratamento no Model (por exemplo, o cep é removido o hífen) essa forma não atenderá, pois não é passado pelo modelo uma vez que ele salva direto no banco */
        // $user->addressDelivery()->create(
        //     [
        //         'address' => 'Rua A (utilizando create)',
        //         'number' => '200',
        //         'complement' => 'Casa',
        //         'zipcode' => '12345-000',
        //         'city' => 'Cruz',
        //         'state' => 'BA'
        //     ]
        // );

        /* Semelhante ao método create, porém para salvar múltiplos registros */
        // $user->addressDelivery()->createMany(
        //     [
        //         [
        //             'address' => 'Rua C (utilizando createMany)',
        //             'number' => '200',
        //             'complement' => 'Casa',
        //             'zipcode' => '12345-000',
        //             'city' => 'Cruz',
        //             'state' => 'BA'
        //         ],
        //         [
        //             'address' => 'Rua D (utilizando createMany)',
        //             'number' => '200',
        //             'complement' => 'Casa',
        //             'zipcode' => '12345-000',
        //             'city' => 'Cruz',
        //             'state' => 'BA'
        //         ]
        //     ]
        // );

        /* Utilizando o with, ele recupera os relacionamento junto com o modelo. Ou seja, nesse caso a variável users possui tanto os registros do usuário quanto do endereço. Não é muito recomendado essa prática a não ser se for utilizado em uma single page. Pois, esse forma demanda de recursos para acesso e consulta ao banco */
        // $users = User::with('addressDelivery')->get();
        // dd($users);



        /* RELACIONAMENTO 1-N */
        $posts = $user->posts()->orderBy('id', 'DESC')->take(2)->get();

        if (!empty($posts)) {
            echo "<h1>Artigos</h1>";
            foreach ($posts as $post) {
                echo "<b>#{$post->id} Título:</b> {$post->title} <br>";
                echo "<b>Subtítulo:</b> {$post->subtitle}<br>";
                echo "<b>Conteúdo:</b> {$post->description}<br><hr>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
