<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>

<body class="app">
    <div id="app">
        <div class="container">
            <div class="row justify-content-md-center col-8 offset-2 ">        
                <div>
                    <div class="titulo"><p>Titulo</p></div>
                    <div class="subtitulo">Subtitulo</div>
                    @yield('principal')
                </div>      
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>