@extends('layout.main')

@section('conteudo')
<form action="/movimentacao" method="post">
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h3>Movimentação de estoque<h3>
                <br>
                @csrf

                <select name="produto">
                    <option value="">Selecione um produto</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->idProd }}">{{ $product->nomeProd }}</option>
                    @endforeach
                </select>





                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade">
                @error('quantidade')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <select name="tipo_movimentacao">
                    <option placeholder="Entrada" value="E">Entrada</option>
                    <option placeholder="Saída" value="S">Saída</option>
                </select>
                <label for="dtMov">Data:</label>
                <input type="date" name="dtMov" id="date" placeholder="dd/mm/aaaa" value="{{ date('Y-m-d') }}">
                @error('dtMov')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror





                <button type="submit">Atualizar Estoque</button>
                @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif



    </div>
</form>
@endsection