@extends('property.master')

@section('content')
<div class="container my-5">

    <h1>Página Single</h1>

    <h2>Título do Imóvel: <?= $property->title ?></h2>

    <p><strong>Descrição:</strong> <?= $property->description ?></p>

    <p><strong>Valor de Locação: </strong>R$ <?= $property->rental_price ?></p>

    <p><strong>Valor de Venda: </strong>R$ <?= $property->sale_price ?></p>
</div>
@endsection