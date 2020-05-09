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

<body>
    <div id="app">
        <div class="container">
            <div class="row ">        
                <div class="col-2">
                        {{-- Hacemos las 4 columnas con un for --}}
                    @for ($i = 0; $i < 4; $i++)
                        <object data="{{ asset('img/Columna.svg') }}" type="image/svg+xml">
                            <!-- Imagen alternativa si el SVG no puede cargarse -->
                            <img src="gráficoalternativo.png" alt="Imagen PNG alternativa">
                        </object>
                    @endfor
                </div>
                <div class="col-8 ">
                    @yield('principal')
                    <div class="titulo"><p>Tipografías</p></div>
                    <div class="subtitulo">Tipografías</div>
                </div>      
                 <div class="col-2 ">
                    {{-- Hacemos las 4 columnas con un for --}}
                    @for ($i = 0; $i < 4; $i++)
                        <object   data="{{ asset('img/Columna.svg') }}" type="image/svg+xml">
                            <!-- Imagen alternativa si el SVG no puede cargarse -->
                            <img src="gráficoalternativo.png" alt="Imagen PNG alternativa">
                        </object>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>