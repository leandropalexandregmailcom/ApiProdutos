<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';
    protected $primaryKey = 'id_produto';

    protected $fillable = ['id_produto', 'nome', 'id_categoria', 'codigo', 'composicao', 'tamanho', 'quantidade', 'created_at', 'updated_at', 'deleted_at'];

    public function imagem()
    {
        return $this->hasMany(Imagem::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
