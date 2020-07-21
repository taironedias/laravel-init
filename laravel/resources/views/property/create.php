<h1>Formulário de Cadastro :: Imóveis</h1>

<form action="<?= url('/imoveis/store') ?>" method="post">

    <?= csrf_field(); ?>

    <label for="title">Titulo</label>
    <input type="text" name="title" id="title">

    <br/>

    <label for="description">Descrição do imóvel</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>

    <br/>

    <label for="rental_price">Valor de Locação</label>
    <input type="text" name="rental_price" id="rental_price">
    
    <br/>

    <label for="sale_price">Valor de Compra</label>
    <input type="text" name="sale_price" id="sale_price">

    <br/>

    <button type="submit">CADASTRAR IMÓVEL</button>

</form>