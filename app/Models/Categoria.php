<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'id_categoria';

    protected $fillable = ['id_categoria', 'nome', 'updated_at', 'deleted_at'];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }
}
