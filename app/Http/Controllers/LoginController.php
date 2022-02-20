<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('site.login');
    }

    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo E-mail é obrigatório.',
            'senha.required' => 'O campo Senha é obrigatório.',
        ];

         //se não passar no validate - retorna a ultima rota
        $request->validate($regras, $feedback);

        // recuperamos os parametros do formulário
        $email      = $request->get('usuario');
        $password   = $request->get('senha');

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if (isset($usuario->name)) {
            session_start();

            $_SESSION['nome']   = $usuario->name;
            $_SESSION['email']  = $usuario->email;

            return redirect()->route('app.home');
        }else {
            return redirect()->back()->with('error', 'Usuário não encontrado!');
        }
    }

    public function sair ()
    {
        session_destroy();

        return redirect()->route('site.index');
    }
}
