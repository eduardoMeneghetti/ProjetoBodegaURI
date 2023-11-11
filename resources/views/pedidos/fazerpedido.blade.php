@extends('layout.main')

@section('conteudo')
<form action="/fazerpedido" method="POST">
    @csrf
    {{-- RETORNOS AO USUÁRIO AO FINALIZAR O PEDIDO(SUPERIOR PÁGINA) --}}
    <h4 class="tituloFuncao">Produtos com estoque</h4>
    <br>
    @if(session('pedidoEnviado'))
    <div class="alert alert-success">
        {{ session('pedidoEnviado') }}
    </div>
    @endif
    @if(session('erroEstoque'))
    <div class="alert alert-danger">
        {{ session('erroEstoque') }}
    </div>
    @endif
    @if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
    @endif
    @if(session('erroInsert'))
    <div class="alert alert-danger">
        {{ session('erroInsert') }}
    </div>
    @endif
    @error('mesa')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('idProd')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('qtdItem')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('erroValorT')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <h3>Lista de comidas</h3>
    <div class="list-group">
        @foreach($produtos as $p)
            @if($p->tipo==='C')
            <div class="d-flex justify-content-between align-items-center">
                <label>
                    <input type="checkbox" name="idProd[]" value="{{ $p->idProd }}">
                    {{ $p->nomeProd }}
                </label>
                <input type="number" name="qtdItem[{{ $p->idProd }}]" value="1" min="1">
            </div>
        @endif
        @endforeach
    </div>
    <br>
    <h3>Lista de Bebidas</h3>
    <div class="list-group">
        @foreach($produtos as $p)
            @if($p->tipo==='B')
            <div class="d-flex justify-content-between align-items-center">
                <label>
                    <input type="checkbox" name="idProd[]" value="{{ $p->idProd }}">
                    {{ $p->nomeProd }}
                </label>
                <input type="number" name="qtdItem[{{ $p->idProd }}]" value="1" min="1">
            </div>
        @endif
        @endforeach
    </div>
    <br>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label"><h3>Mesa<h3></label>
        <input type="number" name="mesa" class="form-control" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label"><h3>Observações do pedido</h3></label>
        <textarea class="form-control" name="obsPed" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="enviar">
</form>
<br>
@endsection


