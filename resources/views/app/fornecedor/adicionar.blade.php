@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor - Adicionar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
    
        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" value="{{ $fornecedor->nome ?? old('nome') }}" class="{{ $errors->has('nome') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('nome')
                        <p style="color: #ff7474;">
                            {{ $message }}
                        </p>
                    @enderror

                    <input type="text" name="site" placeholder="Site" value="{{ $fornecedor->site ?? old('site') }}" class="{{ $errors->has('site') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('site')
                        <p style="color: #ff7474;">
                            {{ $message }}
                        </p>
                    @enderror

                    <input type="text" name="uf" placeholder="UF" value="{{ $fornecedor->uf ?? old('uf') }}" class="{{ $errors->has('uf') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('uf')
                        <p style="color: #ff7474;">
                            {{ $message }}
                        </p>
                    @enderror

                    <input type="text" name="email" placeholder="E-mail" value="{{ $fornecedor->email ?? old('email') }}" class="{{ $errors->has('email') ? 'borda-vermelha' : 'borda-preta'}}">
                    @error('email')
                        <p style="color: #ff7474;">
                            {{ $message }}
                        </p>
                    @enderror
                    
                    <button type="submit" class="borda-preta">
                        @if (isset($fornecedor))
                            Salvar
                        @else
                            Cadastrar
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection