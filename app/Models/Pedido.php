<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function produtos()
    {
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');

        /**
         *  - ATRIBUTOS da função belongsToMany(1, 2, 3, 4);
         * 1 - Modelo do relacionamento NxN em relação ao Modelo que estamos implementando (produto)
         * 2 - É a tabela auxiliar que armazena os registros de relacinamento
         * 3 - representa o noma da FK da tabela mapeada na tabela de relacionamento
         * 4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
         */
    }
}
