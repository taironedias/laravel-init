<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container my-5">
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-5">Cadastrar novo artigo</a>
    <?php if(!empty($posts)) : ?>
        <section class="articles_list">
            <?php foreach ($posts as $post) : ?>
                <article class="mb-5">
                    <h1>{{ $post->title }}</h1>
                    <h2>{{ $post->subtitle }}</h2>
                    <p>{{ $post->description }}</p>
                    <small>Criado em: {{ date('d/m/Y H:i', strtotime($post->created_at)) }} - Editado em: {{ date('d/m/Y H:i', strtotime($post->updated_at)) }}</small>
                    <small>id: {{ $post->id }}</small>
                    <form action="{{ route('posts.destroy', [$post->id]) }}" method="post" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-secondary">Ver</a>
                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-primary">Editar</a>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </article>
            <?php endforeach; ?>
            <hr>
        </section>
    <?php endif; ?>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>