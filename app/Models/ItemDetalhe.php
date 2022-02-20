<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;

    /**
     * Esse é um exemplo para mapear modelos que possui tabela com o nome diferente do Model 
     * e com referência a outra tabela
     */

    protected $table = 'produto_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function item()
    {
        // produto_detalhe possui 1 produto
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id'); // (model, FK, PK)
    }
}
