@extends('layout.main')

@section('conteudo')
<h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr>
                    <td>{{ $p->nomeProd }}</td>
                    <td>{{ $p->precoProd }}</td>
                    <td>{{ $p->descricaoProd }}</td>
                    <td>@if($p->ativo == 1)
                        ativo
                        @else
                        inativo
                        @endif
                    </td>
                    <td>@if($p->tipo == 'C')
                        Comida
                        @else
                        Bebida
                        @endif
                    </td>
                    <td>{{ $p->qtdEst }}</td>
                    <td><a href="{{ route('produtos-edit', ['idProd'=> $p->idProd]) }}" class="btn btn-success">Editar</a>
                </tr>
            @endforeach
        </table>
@endsection('conteudo')
