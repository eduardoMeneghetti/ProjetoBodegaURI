@extends('layout.main')
<div class="img">
@section('conteudo')
<h2 class="Plinha">Listagem de usuários</h2>
<br>

<div class="Plinha">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <th class="Plinha">Id do Usuário</th>
        <th class="Plinha">Nome</th>
        <th class="Plinha">CPF</th>
        <th class="Plinha">Função no sistema</th>
        <th class="Plinha">Senha</th>
        <th class="Plinha">Ações</th>
    </thead>
    <tbody>
        @foreach ($usuarios as $u)
            <tr>
                <td class="Plinha">{{ $u->idFunc }}</td>
                <td class="Plinha">{{ $u->nomeFunc }}</td>
                <td class="Plinha">{{ $u->cpfFunc }}</td>
                <td class="Plinha">
                @if( $u->funcaoSistema == "C")
                Cozinha
                @else
                Atendente
                @endif
                </td>
                <td class="Plinha">{{ $u->senha }}</td>
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
</div>

@endsection
