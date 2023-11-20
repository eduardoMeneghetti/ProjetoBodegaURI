@extends('layout.main')
<div class="img">
@section('conteudo')
<h2 class="Plinha">Cadastro do usuários do sistema</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="{{route('funcionarios-update',['id'=>$funcionarios->idFunc])}}" method="POST">
@csrf
@method('PUT')
<div class="LPlinha">
  <label for="nomeUser" class="form-label">Nome do usuário</label>
  <input type="text" class="form-control" name="nomeUser" id="nomeUser" value="{{$funcionarios->nomeFunc}}" placeholder="Nome exemplo">
  @error('nomeUser')
        <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="LPlinha">
  <label for="cpfUser" class="form-label">CPF do usuário</label>
  <input type="text" class="form-control" name="cpfUser" id="cpfUser" value="{{$funcionarios->cpfFunc}}" placeholder="###.###.###-##">
  @error('cpfUser')
        <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<select class="form-select" name="funcaoUser" aria-label="funcaoUser">
  <option value="{{$funcionarios->funcaoSistema}}"> @if($funcionarios->funcaoSistema == "A") Atendente @elseif($funcionarios->funcaoSistema == "M") Administrador @else Cozinha @endif</option>
  <option value="A">Atendente</option>
  <option value="C">Cozinha</option>
  @error('funcaoUser')
        <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</select>
<br><br>
<div class="LPlinha">
<label for="senhaUser" class="form-label">Senha do usuário</label>
<input type="password" id="senhaUser" value="{{$funcionarios->senha}}" name="senhaUser" class="form-control" aria-describedby="passwordHelpBlock">
@error('senhaUser')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<br>
<div class="botao">
<input class="btn btn-primary" type="submit" value="enviar">
</div>
</form>
@endsection
