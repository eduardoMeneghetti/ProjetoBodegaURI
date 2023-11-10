@extends('layout.main')

@section('conteudo')
<h1>Editar Produto</h1>
<div id="product-edit-container" class="col-md-6 offset-md-3">
    <h1>Edição de Produto</h1>
    <br>
    <form action="{{ route('produtos.atualizar', ['id' => $produto->id]) }}" method="post">
        @csrf
        @method('PATCH') <!-- Use o método PATCH para atualização -->

        <div class="form-group">
            <label for="nomeProd">Nome do produto:</label>
            <input type="text" class="form-control" id="nomeProd" name="nomeProd" placeholder="Nome do produto" value="{{ $produto->nomeProd }}">
            @error('nomeProd')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="precoProd">Preço do produto:</label>
            <input type="number" step="0.01" class="form-control" id="precoProd" name="precoProd" placeholder="Preço unitário produto" value="{{ $produto->precoProd }}">
            @error('precoProd')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-check-label">Descrição do Produto</label>
            <textarea name="descricaoProd" id="descricaoProd" class="form-control" placeholder="peso, etc, etc">{{ $produto->descricaoProd }}</textarea>
            @error('descricaoProd')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" name="ativo" id="ativo" value="1" {{ $produto->ativo ? 'checked' : '' }}>
            <label class="form-check-label" for="ativo">ativo</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>

</form>
@endsection