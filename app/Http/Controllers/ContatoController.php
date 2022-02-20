<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', [
            'titulo' => 'Contato',
            'motivo_contatos' => $motivo_contatos,
        ]);
    }

    public function salvar(Request $request, SiteContato $contato)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];
        $feedbacks = [
            'required'                      => 'O campo :attribute é obrigatório.',
            'nome.min'                      => 'O campo nome precisa ter no minimo 3 caracteres.',
            'nome.max'                      => 'O campo nome precisa ter no máximo 40 caracteres.',
            'email.email'                   => 'O Email informado é inválido.',
            'motivo_contatos_id.required'   => 'O campo Motivo Contato é obrigatório.',
            'mensagem.max'                  => 'A mensagem deve ter no máximo 2.000 caracteres.',
        ];

        $request->validate($regras, $feedbacks);
        $contato->create($request->all());

        return redirect()->back();

    }
}
