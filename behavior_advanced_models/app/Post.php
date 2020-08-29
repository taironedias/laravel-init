<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'slug', 'subtitle', 'description'
    ];

    public const RELATIONSHIP_POST_CATEGORY = 'post_categories';

    public function user() {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Método de relacionamento N-N, sendo:
     * 1° parâmetro o modelo que deseja obter as informações do relacionamento
     * 2° a tabela intermediária entre o relacionamento da tabela posts e tabela categories
     * 3° foreign key presente na tabela intermediária que pertence a esse modelo
     * 4° foreign key presente na tabela intermediária que pertece ao modelo do 1° parâmetro
     */
    public function categories() {
        return $this->belongsToMany(Category::class, self::RELATIONSHIP_POST_CATEGORY, 'post', 'category');
    }
}
