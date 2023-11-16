@extends('layout.main')
<div class="img">
@section('conteudo')
<form action="/movimentacao" method="post">
   
        <h2 class="Plinha">Movimentação de estoque<h2>
                <br>
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
                
                

                @csrf
                <div class="LPlinha">
                <label for="dtMov">Selecione um Produto</label>
                </div>
                <select name="produto">
                    <option value="">Selecione um produto</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->idProd }}">{{ $product->nomeProd }}</option>
                    @endforeach
                </select>
                
                <br>
                <div class="LPlinha">
                <label for="quantidade">Quantidade:</label>
                </div>
                <input type="number" name="quantidade" id="quantidade">
                @error('quantidade')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <div class="LPlinha">
                <label for="dtMov">Tipo de movimentação</label>
                </div>
                <select name="tipo_movimentacao">
                    <option placeholder="Entrada" value="E">Entrada</option>
                    <option placeholder="Saída" value="S">Saída</option>
                </select>]
                <br>
                <div class="LPlinha">
                <label for="dtMov">Data:</label>
                </div>
                <input type="date" name="dtMov" id="date" placeholder="dd/mm/aaaa" value="{{ date('Y-m-d H:i:s') }}">
                @error('dtMov')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <br>
                <div class="botao">
                <button type="submit" class="btn btn-primary">Atualizar Estoque</button>
                </div>
                    
</form>
@endsection
