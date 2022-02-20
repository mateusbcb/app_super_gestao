<form action="{{ route('pedido-produto.store', $pedido->id) }}" method="post">
    @csrf
    <select name="produto_id" class="{{ $errors->has('produto_id') ? 'borda-vermelha' : 'borda-preta'}}">
        <option>-- Selecione um produto --</option>
        @foreach ($produtos as $produto)
        <option value="{{ $produto->id }}" {{ ( old('produto_id')) == $produto->id ? 'selected' : ''}}>{{ $produto->nome }}</option>
        @endforeach
    </select>
    @error('produto_id')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <input type="number" name="quantidade" id="quantidade" value="{{ old('quantidade') ? old('quantidade') : '' }}" placeholder="quantidade" class="{{ $errors->has('quantidade') ? 'borda-vermelha' : 'borda-preta'}}">
    @error('quantidade')
        <p style="color: #ff7474;">
            {{ $message }}
        </p>
    @enderror

    <button type="submit" class="borda-preta">
        @if (isset($pedido->id))
            Salvar
        @else
            Cadastrar
        @endif
    </button>
</form>