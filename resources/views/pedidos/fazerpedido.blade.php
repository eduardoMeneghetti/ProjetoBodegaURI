@extends('layout.main')

@section('conteudo')
<form action="/fazerpedido" method="POST">
    @csrf
    <h3>Realize o pedido</h3>
    <div class="list-group">
        @foreach($produtos as $p)
            <div class="d-flex justify-content-between align-items-center">
                <label>
                    <input type="checkbox" name="idProd[]" value="{{ $p->idProd }}">
                    {{ $p->nomeProd }}
                </label>
                <input type="number" name="qtdItem[{{ $p->idProd }}]" value="1" min="1">
            </div>
        @endforeach
    </div>
    <button type="submit">Enviar Pedido</button>
</form>
@endsection
