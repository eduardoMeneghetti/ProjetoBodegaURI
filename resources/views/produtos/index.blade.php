@extends('layout.main')
<div class="img">
@section('conteudo')
<h2 class="Plinha">Listagem de produtos</h2>
    <div class="Plinha">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <th class="Plinha">Nome do Produto</th>
                <th class="Plinha">Preço do Produto</th>
                <th class="Plinha">Descrição do Produto</th>
                <th class="Plinha">Validação do Produto</th>
                <th class="Plinha">Tipo do Produto</th>
                <th class="Plinha">Quantidade do Produto</th>
                <th class="Plinha">Ação</th>
            </thead>
            <tbody>
                @foreach ($produtos as $p)
                <tr>
                    <td class="Plinha">{{ $p->nomeProd }}</td>
                    <td class="Plinha">{{ $p->precoProd }}</td>
                    <td class="Plinha">{{ $p->descricaoProd }}</td>
                    <td class="Plinha">@if($p->ativo == 1)
                        ativo
                        @else
                        inativo
                        @endif
                    </td>
                    <td class="Plinha">@if($p->tipo == 'C')
                        Comida
                        @else
                        Bebida
                        @endif
                    </td>
                    <td class="Plinha">{{ $p->qtdEst }}</td>
                    <td><a href="{{ route('produtos-edit', ['idProd'=> $p->idProd]) }}" class="btn btn-success">Editar</a>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection('conteudo')
