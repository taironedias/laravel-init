@extends('property.master')

@section('content')
<div class="container my-5">
    <h1>Formulário de Edição :: Imóveis</h1>

    <form action="<?= url('/imoveis/update', ['id' => $property->id]) ?>" method="post">

        <?= csrf_field(); ?>
        <?= method_field('PUT'); ?>

        <div class="form-group">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $property->title ?>">
        </div>

        <div class="form-group">
            <label for="description">Descrição do imóvel</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $property->description ?></textarea>
        </div>

        <div class="form-group">
            <label for="rental_price">Valor de Locação</label>
            <input class="form-control" type="text" name="rental_price" id="rental_price" value="<?= $property->rental_price ?>">
        </div>

        <div class="form-group">
            <label for="sale_price">Valor de Compra</label>
            <input class="form-control" type="text" name="sale_price" id="sale_price" value="<?= $property->sale_price ?>">
        </div>


        <button class="btn btn-primary" type="submit">ATUALIZAR IMÓVEL</button>

    </form>
</div>
@endsection