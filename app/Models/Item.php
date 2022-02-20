<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * Esse é um exemplo para mapear modelos que possui tabela com o nome diferente do Model 
     * e com referência a outra tabela
     */

     // nome da tabela
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe()
    {
        // Produto tem 1 produtoDetalhe
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');// os 2 atributos depois do model, indicam o campo que possui a FK e o segundo o campo do PK
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function produtos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
    }
}
