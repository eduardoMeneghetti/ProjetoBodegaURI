@extends('layout.main')

@section('conteudo')
<h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                <th style="text-align:center">Nome produto</th>
                </tr>
            </thead>
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
                    <td><button type="button" class="btn btn-success">editar</button></td>
                </tr>
            @endforeach
        </table>
@endsection('conteudo')
