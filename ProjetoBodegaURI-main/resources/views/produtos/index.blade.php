@extends('layout.main')

@section('conteudo')
<h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <= 1 ? 'danger' : ''}}">
                    <td>{{ $p->nomeProd }}</td>
                    <td>{{ $p->precoProd }}</td>
                    <td>{{ $p->descricaoProd }}</td>
                    <td>{{ $p->ativo }}</td>
                    <td>{{ $p->tipo }}</td>
                </tr>
            @endforeach
        </table>
@endsection('conteudo')
