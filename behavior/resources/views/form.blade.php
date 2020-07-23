<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário :: Mod Rotas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container my-5">
        <form action="" autocomplete="off">
        
            <div class="form-group">
                <label for="first_name">Primeiro Nome</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="Tairone">
            </div>

            <div class="form-group">
                <label for="last_name">Sobrenome</label>
                <input class="form-control" type="text" name="last_name" id="last_name" value="Dias">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input class="form-control" type="email" name="email" id="email" value="taironecdias@gmail.com">
            </div>

            <button class="btn btn-primary" type="submit">Enviar!</button>

        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>