@extends('property.master')

@section('content')
<div class="container my-5">
    <h1>Formulário de Cadastro :: Imóveis</h1>

    <form action="<?= url('/imoveis/store') ?>" method="post">

        <?= csrf_field(); ?>

        <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="description">Descrição do imóvel</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label for="rental_price">Valor de Locação</label>
            <input class="form-control" type="text" name="rental_price" id="rental_price">
        </div>
        <div class="form-group">
            <label for="sale_price">Valor de Compra</label>
            <input class="form-control" type="text" name="sale_price" id="sale_price">
        </div>

        <button class="btn btn-primary" type="submit">CADASTRAR IMÓVEL</button>

    </form>
</div>
@endsection