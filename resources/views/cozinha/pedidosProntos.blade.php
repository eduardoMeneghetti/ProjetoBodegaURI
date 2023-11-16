@extends('layout.main')
<div class="img">
@section('conteudo')
<h2 class="Plinha">Pedidos Prontos</h2>
<br>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <th class="Plinha">Pedido</th>
        <th class="Plinha">Data e hora</th>
        <th class="Plinha">Mesa</th>
        <th class="Plinha">Observações</th>
        <th class="Plinha">Nome do Produto</th>
    </thead>
    <tbody>
        @foreach ($pedidos as $p)
            <tr>
                <td class="Plinha">{{ $p->idPed }}</td>
                <td class="Plinha">{{ $p->dataPedidoFormatada }}</td>
                <td class="Plinha">{{ $p->mesa }}</td>
                <td class="Plinha">{{ $p->obsPed }}</td>
                <td class="Plinha">{{ $p->nomeProd }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
