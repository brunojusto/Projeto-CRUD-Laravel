<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'url', 'descricao'];

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
