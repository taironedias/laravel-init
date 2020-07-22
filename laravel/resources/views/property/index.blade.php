@extends('property.master')

@section('content')
<div class="container my-5">
    <h1>Listagem de Imóveis</h1>

    <?php

    if (!empty($properties)) {

        echo '<table class="table table-striped table-hover">';
        echo '<thead class="bg-primary text-white">
                <td>Título</td>
                <td>Valor da Locação</td>
                <td>Valor de Compra</td>
                <td>Ações</td>
            </thead>';

        foreach ($properties as $item) {
            $linkReadMore = url("/imoveis/{$item->name}");
            $linkEditItem = url("/imoveis/editar/{$item->name}");
            $linkRemoveItem = url("/imoveis/remover/{$item->name}");
            echo "<tr>
                    <td>{$item->title}</td>
                    <td>R$ " . number_format($item->rental_price / 100, 2, ',', '.') . "</td>
                    <td>R$ " . number_format($item->sale_price / 100, 2, ',', '.') . "</td>
                    <td><a href='{$linkReadMore}'>Ver Mais</a> | <a href='{$linkEditItem}'>Editar</a> | <a href='{$linkRemoveItem}'>Remover</a></td>
                </tr>";
        }

        echo '</table>';
    }

    ?>
</div>
@endsection