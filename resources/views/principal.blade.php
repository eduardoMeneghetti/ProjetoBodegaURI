@extends('layout.main')

@section('conteudo')
<div class="container text-center">
  <div class="row justify-content-md-center">
    <div class="col-md-auto">
    <a type="button" href="/create" class="btn btn-primary btn-block">Cadastro de produtos</a><br>
    <a type="button" href="/movimentacao" class="btn btn-primary btn-block">Lançamento de estoque</a><br>
    <a type="button" href="/pedidosAdm" class="btn btn-primary btn-block">Pedidos em espera</a><br>
    <a type="button" href="/pedidosProntos" class="btn btn-primary btn-block">Pedidos liberados</a><br>
    <a type="button" href="/SemPagina" class="btn btn-primary btn-block">Cadastro de novos usuários</a><br>
    </div>
  </div>
</div>

@endsection
