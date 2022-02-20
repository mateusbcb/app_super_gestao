<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // carregamento Eager Loading - ancioso (carrega todas as informações das tabelas de referência)
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        
        // Carregamento Lazy Loading - Tardio (carrega as informações das tabelas de referência após a chamada do metodo da outra tabela)
        /*$produtos = Item::paginate(10);*/
        // $produtos = Produto::paginate(10);
        // forma de trazer as colunas relacionadas 1x1 a uma tabela sem o uso do ORM Enloquent
        /*
        foreach ($produtos as $key => $produto) {
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if (isset($produtoDetalhe)) {
                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;
            }
        }
        */
        return view('app.produto.index', [
            'produtos' => $produtos,
            'request' =>$request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.create', [
            'fornecedores' => $fornecedores,
            'unidades' => $unidades,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'      => 'required|min:3|max:40',
            'peso'      => 'required',
            'descricao' => 'required|max:2000',
            'unidade_id'   => 'required|exists:unidades,id',
            'fornecedor_id'   => 'required|exists:fornecedores,id',
        ];

        $feedbacks = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'Ocampo nome precisa ter no minimo 3 caracteres.',
            'nome.max' => 'Ocampo nome precisa ter no máximo 40 caracteres.',
            'descricao.max' => 'Ocampo descricao precisa ter no máximo 500 caracteres.',
            'unidade_id.exists' => 'A unidade de medida informado não existe',
            'fornecedor_id.exists' => 'O Fornecedor informado não existe',
        ];

        $request->validate($regras, $feedbacks);
        
        Item::create($request->all());

        return redirect()->route('produto.index')->with('success', 'Produto Criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', [
            'produto' => $produto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();

        return view('app.produto.edit', [
            'produto' => $produto,
            'fornecedores' => $fornecedores,
            'unidades' => $unidades,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome'      => 'required|min:3|max:40',
            'peso'      => 'required',
            'descricao' => 'required|max:2000',
            'unidade_id'   => 'required|exists:unidades,id',
            'fornecedor_id'   => 'required|exists:fornecedores,id',
        ];

        $feedbacks = [
            'required' => 'O campo :attribute é obrigatório!',
            'nome.min' => 'Ocampo nome precisa ter no minimo 3 caracteres.',
            'nome.max' => 'Ocampo nome precisa ter no máximo 40 caracteres.',
            'descricao.max' => 'Ocampo descricao precisa ter no máximo 500 caracteres.',
            'unidade_id.exists' => 'A unidade de medida informado não existe',
            'fornecedor_id.exists' => 'O Fornecedor informado não existe',
        ];

        $request->validate($regras, $feedbacks);

        $produto->update($request->all());

        return redirect()->route('produto.show', [
            'produto' => $produto->id,
        ])->with('success', 'Produto Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->back()->with('success', 'Produto removido com sucesso!');
    }
}
