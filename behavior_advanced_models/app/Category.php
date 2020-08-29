<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = ['name', 'slug'];

    /**
     * Método de relacionamento N-N, sendo:
     * 1° parâmetro o modelo que deseja obter as informações do relacionamento
     * 2° a tabela intermediária entre o relacionamento (neste caso, post_categories)
     * 3° foreign key presente na tabela intermediária que pertence a esse modelo
     * 4° foreign key presente na tabela intermediária que pertece ao modelo do 1° parâmetro
     */
    public function posts() {
        return $this->belongsToMany(Post::class, Post::RELATIONSHIP_POST_CATEGORY, 'category', 'post');
    }
}
