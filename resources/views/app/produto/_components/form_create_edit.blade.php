@if (isset($produto->id))
    <form action="{{ route('produto.update', $produto->id) }}" method="post">
        @method('PUT')
@else
        <form action="{{ route('produto.store') }}" method="post">
@endif
    @csrf
    <select name="fornecedor_id" class="{{ $errors->has('fornecedor_id') ? 'borda-vermelha' : 'borda-preta'}}">
        <option>-- Selecione um fornecedor --</option>
        @foreach ($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    @error('fornecedor_id')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror
    
    <input type="text" name="nome" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}" class="{{ $errors->has('nome') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('nome')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="text" name="descricao" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}" class="{{ $errors->has('descricao') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('descricao')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="number" name="peso" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}" class="{{ $errors->has('peso') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('peso')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <select name="unidade_id" class="{{ $errors->has('unidade_id') ? 'borda-vermelha' : 'borda-preta'}}">
        <option>-- Selecione a unidade de medida --</option>
        @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    @error('unidade_id')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <button type="submit" class="borda-preta">
        @if (isset($produto->id))
            Salvar
        @else
            Cadastrar
        @endif
    </button>
</form>