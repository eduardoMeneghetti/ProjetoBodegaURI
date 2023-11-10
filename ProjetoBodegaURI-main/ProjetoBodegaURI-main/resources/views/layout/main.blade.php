<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bodega Software</title>

        {{-- Link para a fonte escolhida--}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

        {{-- Link para o css--}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        {{-- Link para o bootstrap--}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
    <h1 class="tituloP">Bodega Software</h1>
    <p>Seu software de gerenciamento</p>
    <br>
    <br>
    <div class="container">

    @yield('conteudo')

    </div>
<footer class="footer">
    <p>Direitos reservados @bodega 2023</p>
</footer>
