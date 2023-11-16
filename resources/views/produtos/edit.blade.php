@extends('layout.main')

@section('conteudo')
    <h1>Edição de Produtos<h1>
    <br>
    <form action="{{  route('produtos-update',['idProd'=>$produtos->idProd])  }}" method="post">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="nomeProd"> Nome do produto: </label>
            <input type="text" class="form-control" id="nomeProd" name="nomeProd" placeholder="Nome do produto" value='{{ $produtos->nomeProd }}'>
            @error('nomeProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="precoProd"> Preço do produto: </label>
            <input type="number" step="0.01" class="form-control" id="precoProd" name="precoProd" placeholder="Preço unitário produto" value='{{ $produtos->precoProd }}'>
            @error('precoProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-check-label">Descrição do Produto</label>
            <textarea name="descricaoProd" id="descricaoProd" class="form-control" placeholder="peso, etc, etc" >{{ $produtos->descricaoProd }}</textarea>
            @error('descricaoProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" role="switch" name="ativo" id="ativo" value='{{ $produtos->ativo }}'>
        <label class="form-check-label" for="flexSwitchCheckDefault">ativo</label>

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



        // Variável para rastrear se o campo "ativo" já foi marcado
    let ativoJaMarcado = false;

    // Obtém todos os campos de entrada dentro do formulário
    const formFields = document.querySelectorAll('form input[type="text"], form input[type="number"], form textarea');

    // Obtém o campo "ativo"
    const ativoCheckbox = document.getElementById('ativo');

    

    </script>

    <br>
        <div class="form-group">
        <select name="tipo" class="form-select" aria-label="Default select example">
        <option value="{{$produtos->tipo}}"> @if($produtos->tipo == "C") Comida @else Bebida @endif</option>
        <option value="C">Comida</option>
        <option value="B">Bebida</option>
        </select>
        </div>
        <div class="botao">
        <input type="submit" class="btn btn-primary" value="Editar">
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif




    </form>
@endsection
