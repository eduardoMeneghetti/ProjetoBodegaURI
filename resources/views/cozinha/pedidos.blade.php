@extends('layout.main')

@section('conteudo')
<h3 class="tituloFuncao">Pedidos aguardando</h3>
<br>
<form action="/pedidos{idPed}" method="POST">
        <table class="table table-striped table-bordered table-hover">
                <thead>
                    <th style="text-align:center">Pedido</th>
                    <th style="text-align:center">Data e hora</th>
                    <th style="text-align:center">Mesa</th>
                    <th style="text-align:center">Observações</th>
                    <th style="text-align:center">Nome do Produto</th>
                    <th style="text-align:center"> Enviar pedido</th>
                </thead>
            @foreach ($pedidos as $p)
                <tbody>
                <tr>
                    <td style="text-align:center" >{{ $p->idPed }}</td>
                    <td style="text-align:center" >{{ $p->dataPedidoFormatada }}</td>
                    <td style="text-align:center" >{{ $p->mesa }}</td>
                    <td style="text-align:center" >{{ $p->obsPed }}</td>
                    <td style="text-align:center" >{{ $p->idProd }}</td>
                    <td><button type="submit" class="btn btn-success">Enviar</button></td>
                </tr>
                </tbody>
            @endforeach
        </table>
</form>
@endsection('conteudo')
