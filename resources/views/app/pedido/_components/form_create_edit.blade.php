@if (isset($pedido->id))
    <form action="{{ route('pedido.update', $pedido->id) }}" method="post">
        @method('PUT')
@else
        <form action="{{ route('pedido.store') }}" method="post">
@endif
    @csrf
    <select name="cliente_id" class="{{ $errors->has('cliente_id') ? 'borda-vermelha' : 'borda-preta'}}">
        <option>-- Selecione um cliente --</option>
        @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option>
        @endforeach
    </select>
    @error('cliente_id')
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