<!DOCTYPE html>
<?php


    $nom="tema";
    if(isset($_COOKIE[$nom])) {
        if($_COOKIE[$nom] == "dark"){
            $style = "<link rel='stylesheet' href='css/bootstrapDark.css'>";
            $rutaImg = "resources/img/IsotipoCirculoDark.svg";


        }
        else{
            $style= "<link rel='stylesheet' href='css/bootstrap.css'>";
            $rutaImg = "resources/img/IsotipoCirculo.svg";

        }
    }else{
        $style= "<link rel='stylesheet' href='css/bootstrap.css'>";
        $rutaImg = "resources/img/IsotipoCirculo.svg";

    }

   $ruta = "<div id='ruta' desc='" . $rutaImg ."'/>";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('titulo')
    </title>
    <?php echo $style ?>
</head>

<body class="app">
    <div class="contanier ">
        <nav class="navbar navbar-expand-lg navegador navbar-fixed-top fixed-top col col-12 bordes">
             <a class="navbar-brand col-2 offset-1" href="{{ url('/') }}">
                <img src="<?php echo $rutaImg ?>" width="50%" height="50%" class="d-inline-block align-top" alt="">
                
            </a>
             <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="#">Home</a></li>
            </ol>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse dropdown navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        {{-- DAFO --}}
                        <a class="nav-link" href="#">Analisis</a>
                    </li>
                    <li class="nav-item">
                        {{-- Musica/DAW/DAM --}}
                        <a class="nav-link" href="#">Projectes</a>
                    </li>
                    <li class="nav-item">
                        {{-- Xarxes Socials --}}
                        <a class="nav-link" href="#">Social</a>
                    </li>
                    <li class="nav-item">
                        {{-- BTN Download CV --}}
                        <a class="nav-link" href="#">CV</a>
                    </li>
                    {{-- Selector d'idioma + canvi de tema--}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Configuració
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="cursos.php">Cursos</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div id="app">
        <div class="container">
            
            <div class="row  col-8 offset-2 ">        
                @yield('principal')
            </div>
        </div>
    </div>
    <?php echo $ruta ?>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>


</body>

</html>