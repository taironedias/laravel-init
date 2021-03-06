<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Método que contém um relacionamento de 1-1
     * Nesse caso, o id do usuário está como foreignKey da tabela Address
     */
    public function addressDelivery() {
        return $this->hasOne(Address::class, 'user', 'id');
    }

    /**
     * Método que contém um relacionamento de 1-N
     * Nesse caso, o usuário pode ter vários artigos cadastrados.
     */
    public function posts() {
        return $this->hasMany(Post::class, 'author', 'id');
    }

    public function commentsOnMyPosts() {
        return $this->hasManyThrough(Comment::class, Post::class, 'author', 'post', 'id', 'id');
    }
}
