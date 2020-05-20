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
            <div class="row  col-8 offset-2 ">        
                @yield('principal')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>

</body>

</html>