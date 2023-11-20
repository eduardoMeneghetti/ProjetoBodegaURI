@extends('layout.mainAC')
<div class="img">
@section('conteudo')
<h2 class="Plinha">Pedidos em espera</h2>
<br>

<div class="Plinha">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <th class="Plinha">Pedido</th>
        <th class="Plinha">Data e hora</th>
        <th class="Plinha">Mesa</th>
        <th class="Plinha">Observações</th>
        <th class="Plinha">Nome do Produto</th>
        <th class="Plinha">Enviar pedido</th>
    </thead>
    <tbody>
        @foreach ($pedidos as $p)
            <tr>
                <td class="Plinha">{{ $p->idPed }}</td>
                <td class="Plinha">{{ $p->dataPedidoFormatada }}</td>
                <td class="Plinha">{{ $p->mesa }}</td>
                <td class="Plinha">{{ $p->obsPed }}</td>
                <td class="Plinha">{{ $p->nomeProd }}</td>
                <td>
                <form action="/pedidos/{{ $p->idItemPed }}/edit" method="POST">
                @csrf
                <div class="tituloMeio">
                <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
