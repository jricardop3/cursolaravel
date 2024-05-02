<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'slug',
        'id_user',
        'id_categoria'
        

    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}

