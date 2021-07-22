<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagem';
    protected $primaryKey = 'id_imagem';

    protected $fillable = ['id_imagem', 'nome', 'updated_at', 'deleted_at'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
