<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoProduto extends Model
{
    use HasFactory;

    protected $table = 'historico_produto';
    protected $primaryKey = 'id_historico_produto';
    protected $foreignKey = 'id_produto';

    protected $fillable = ['id_historico_produto', 'id_produto', 'updated_at', 'deleted_at'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
