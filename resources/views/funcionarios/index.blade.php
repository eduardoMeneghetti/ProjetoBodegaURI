@extends('layout.main')

@section('conteudo')
<h3 class="tituloFuncao">Listagem de usuários</h3>
<br>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <th style="text-align:center">Id do Usuário</th>
        <th style="text-align:center">Nome</th>
        <th style="text-align:center">CPF</th>
        <th style="text-align:center">Função no sistema</th>
        <th style="text-align:center">Senha</th>
        <th style="text-align:center">Ações</th>
    </thead>
    <tbody>
        @foreach ($usuarios as $u)
            <tr>
                <td style="text-align:center">{{ $u->idFunc }}</td>
                <td style="text-align:center">{{ $u->nomeFunc }}</td>
                <td style="text-align:center">{{ $u->cpfFunc }}</td>
                <td style="text-align:center">
                @if( $u->funcaoSistema == "C")
                Cozinha
                @else
                Atendente
                @endif
                </td>
                <td style="text-align:center">{{ $u->senha }}</td>
                <td>
                <form action="/createUser/{{ $u->idFunc }}/edit" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Editar</button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
