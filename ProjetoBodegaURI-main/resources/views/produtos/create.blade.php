@extends('layout.main')

@section('conteudo')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastro de produtos<h1>
    <br>
    <form action="/create" method="post">
    @csrf
        <div class="form-group">
            <label for="nomeProd"> Nome do produto: </label>
            <input type="text" class="form-control" id="nomeProd" name="nomeProd" placeholder="Nome do produto">
        </div>
        <div class="form-group">
            <label for="precoProd"> Preço do produto: </label>
            <input type="number" step="0.01" class="form-control" id="precoProd" name="precoProd" placeholder="Preço unitário produto">
        </div>
        <div class="form-group">
            <label class="form-check-label">Descição do Produto</label>
            <textarea name="descricaoProd" id="descricaoProd" class="form-control" placeholder="peso, etc, etc "></textarea>
        </div>
        <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="ativo" id="ativo" checked>
    <label class="form-check-label" for="flexSwitchCheckDefault">ativo</label>
    <input type="hidden" name="ativo" value="1"> <!-- Campo oculto com valor padrão 1 -->
    </div>
    <script>
    document.getElementById('ativo').addEventListener('change', function() {
        let hiddenInput = document.querySelector('input[name="ativo"]');
        hiddenInput.value = this.checked ? 1 : 0;
    });
    document.addEventListener('DOMContentLoaded', function() {
        let hiddenInput = document.querySelector('input[name="ativo"]');
        let checkbox = document.getElementById('ativo');
        checkbox.checked = hiddenInput.value == 1 ? true : false;
    });
    </script>
    <br>
        <div class="form-group">
        <select name="tipo" class="form-select" aria-label="Default select example">
        <option selected>Tipo do produto</option>
        <option value="C">Lanche</option>
        <option value="B">Bebida</option>
        </select>
        </div>
        <input type="submit" class="btn btn-primary" value="cadastrar">
    </form>
</div>
@endsection
