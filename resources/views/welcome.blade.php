<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        {{-- Link para a fonte escolhida--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        {{-- Link para o css--}}
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">

        {{-- Link para o bootstrap--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<div class="principal">
{{-- Caso o usuário não exista irá sublinhar o erro do controller --}}
@if(session('erro'))
    <div class="alert alert-danger">
        {{ session('erro') }}
    </div>
@endif
<h1 class="tituloP">Bodega Software</h1>
<p class="tituloP">Seu software de gerenciamento</p>
<br>
<br>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Por gentileza coloque seu usuário e senha!</p>

            {{-- Inicio do form para login --}}
              <form action="/" method="post">
                @csrf
              <div class="form-outline form-white mb-4">
                <input type="text" id="addon-wrapping" for="usuario" name="usuario" class="form-control form-control-lg" />
                @error('usuario')
                <span>{{ $message }}</span>
                @enderror
                <label class="form-label">Usuário</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="typePasswordX" for="senha" name="senha" class="form-control form-control-lg" />
                @error('senha')
                <span>{{ $message }}</span>
                @enderror
                <label class="form-label" for="Senha" name="senha" >Senha</label>
            </div>

              <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
