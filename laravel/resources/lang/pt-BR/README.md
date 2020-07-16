## :globe_with_meridians: Tradução Laravel - Português do Brasil (pt_BR)
Esse repositório tem a finalidade de abrigar as traduções dos arquivos contidos em `/resources/lang/en` para o português brasileiro sobre a versão `7.19.*` do Laravel.


## :rocket: Instalação

Acesse o diretório referente aos arquivos que serão copiados

```bash
cd resources/lang/
```

Efetue o clone deste repositório setando a versão do framework

```bash
git clone https://github.com/taironedias/laravel-pt_BR.git ./pt-BR
```

Nesse momento será feito o clone do repositório para dentro do seu projeto!

> Nesse momento, caso já exista uma pasta com o mesmo nome do repositório, os arquivos serão substituídos

Agora, remova os arquivos gerados automaticamente pelo **git** dentro da sua aplicação.

```bash
rm -rf pt-BR/.git/
```

Por fim, basta informar ao Laravel de que há outro idioma. Para isso, edite o arquivo `/config/app.php` e altere o valor da propriedade `locale` para `pt-br`

```php
'locale' => 'pt-br',
```

## :heart_eyes: Contribuição
Se desejar enviar correções de alguma tradução, basta efetuar um pull-request deste repositório e com as alterações em uma nova branch. É interessante criar a branch com o seu nome ou username do git, para facilitar a aprovação.

De qualquer forma agradeço! :smile:

---
Made with :books: and :headphones: by Tairone Dias :wave: [Get in touch!](https://www.linkedin.com/in/tcdias/)