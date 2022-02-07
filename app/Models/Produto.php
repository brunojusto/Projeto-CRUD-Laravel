<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['categorias_id','nome', 'preco', 'descricao'];

    public function categorias(){
        return $this->belongsTo(Categorias::class);
    }
}
