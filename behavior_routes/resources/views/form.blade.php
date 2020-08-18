<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form :: Teste de Rotas</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <form action="{{ url('/users/1') }}" method="POST" autocomplete="off">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Tem helper do blade (facilitador) -->
            @method('DELETE')
            <!-- Tem a forma completa -->
            <!-- <input type="hidden" name="_method" value="DELETE"> -->

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
</body>
</html>