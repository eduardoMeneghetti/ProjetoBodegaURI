@extends('layout.main')

@section('conteudo')
<form action="/fazerpedido" method="POST">
    @csrf
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
    <h3>Lista de comidas:</h3>
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
    <h3>Lista de Bebidas:</h3>
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
    <input class="btn btn-primary" type="submit" value="enviar">
</form>
<br>
@error('idProd')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('qtdItem')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror
@if(session('pedidoEnviado'))
    <div class="alert alert-success">
        {{ session('pedidoEnviado') }}
    </div>
@endif
@error('erroValorT')
        <div class="alert alert-danger">{{ $message }}</div>
@enderror
@endsection
