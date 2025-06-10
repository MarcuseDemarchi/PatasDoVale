<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
        <!-- Arquivo CSS # asset é uma funçao do laravel que procura o arquivo que instanciamos dentro da public!-->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" /> 
    </head>
    <body>
        @include('components.header')

        @yield('content','Nenhum conteudo instanciado')
    </body>
</html>
