@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')
<div class="conteudo-destaque">
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div style="width: 30%; margin-left: auto; margin-right: auto;">

            <div class="informacao-pagina">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <input type="text" name="usuario" placeholder="Usuário" value="{{ old('usuario') }}" class="{{ $errors->has('usuario') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('usuario')
                        {{ $message }}
                    @enderror

                    <input type="password" name="senha" placeholder="Senha" value="{{ old('senha') }}" class="{{ $errors->has('senha') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('senha')
                        {{ $message }}
                    @enderror

                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
</div>
@endsection
