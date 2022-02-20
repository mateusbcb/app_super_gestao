@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', $produto_detalhe->id) }}" method="post">
        @method('PUT')
@else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
@endif
    @csrf
    <input type="text" name="produto_id" placeholder="ID do Produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" class="{{ $errors->has('produto_id') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('produto_id')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="text" name="comprimento" placeholder="Comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" class="{{ $errors->has('comprimento') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('comprimento')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="number" name="largura" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" class="{{ $errors->has('largura') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('largura')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="number" name="altura" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" class="{{ $errors->has('altura') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('altura')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror
    
    <select name="unidade_id" class="{{ $errors->has('unidade_id') ? 'borda-vermelha' : 'borda-preta'}}">
        <option>-- Selecione a unidade de medida --</option>
        @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>
    @error('unidade_id')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <button type="submit" class="borda-preta">
        @if (isset($produto_detalhe->id))
            Salvar
        @else
            Cadastrar
        @endif
    </button>
</form>