<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user', 'address', 'number', 'complement', 'zipcode', 'city', 'state'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user', 'id');
    }
}
