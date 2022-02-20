<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(3);

        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores,
            'request' => $request->all(),
        ]);
    }

    public function adicionar(Request $request)
    {
        // inclusão
        if($request->_token != '' && $request->id == ''){
            // validando
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required'      => 'O campo :attribute é obrigatório!',
                'nome.min'      => 'O campo Nome precisa ter no minimo 3 caracteres!',
                'nome.max'      => 'O campo Nome precisa ter no máximo 40 caracteres!',
                'uf.min'        => 'O campo UF precisa ter no minimo 2 caracteres!',
                'uf.max'        => 'O campo UF precisa ter no máximo 2 caracteres!',
                'email.email'   => 'O E-mail deve ser um e-mail válido!',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            return redirect()->route('app.fornecedor')->with('success', 'Fornecedor criado com sucesso!');
        }

        // Edição
        if($request->_token != '' && $request->id != ''){
            $fornecedor = Fornecedor::find($request->id);

            $update = $fornecedor->update($request->all());

            if ($update) {
                return redirect()->route('app.fornecedor')->with('success', 'Update realizado com sucesso!');
            }else {
                return redirect()->route('app.fornecedor')->with('error', 'Update apresentou problema!');
            }
        }

        return view('app.fornecedor.adicionar');
    }

    public function editar($id)
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', [
            'fornecedor' => $fornecedor
        ]);
    }

    public function excluir($id)
    {
        // para fornecedores foi feito usando o softDeletes que não remove o registro do DB e sim atualiza o campo deleted_at
        $fornecedor = Fornecedor::find($id)->delete();

        // para remover o registro da tabela use o foreceDelete()
        // $fornecedor = Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor')->with('success', 'Fornecedor Excluido com sucesso!');
    }
}
