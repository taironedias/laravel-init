<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $table = "posts";
    protected $primaryKey = "id";

    public $timestamps = true;

    /** A variável $fillable é utilizada caso utilize o método (ii) de inserção dos dados. 
     * Nessa variável, você define quais campos serão permitidos passar os dados para serem salvos.
     * Já a variável $guarded, tem o significado inverso: ele bloqueia quais campos não devem ser passados para salvar no banco.
     */
    public $fillable = ['title', 'subtitle', 'description'];
    public $guarded = [];
}
