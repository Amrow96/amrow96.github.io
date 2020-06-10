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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
        @yield('titulo')
    </title>
    <?php echo $style ?>
</head>

<body class="app">  
    <div id="app">

        <div id="navegador" class="contanier invisible ">
            <nav  class="navbar  navbar-expand-lg navegador navbar-fixed-top fixed-top col col-12 bordes">
                <a class="navbar-brand col-2 offset-1" href="{{ url('/') }}">
                    <img src="<?php echo $rutaImg ?>" width="40%" height="40%" class="d-inline-block align-top" alt="">
                    
                </a>
                <ol id="breadcrumb" class="invisible breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li> 
                </ol>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse dropdown navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    
                        {{-- VIDEO --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            {{-- DAFO --}}
                            <a class="nav-link" href="#analisis">Analisis</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="#skills">Skills</a>
                        </li>
                        <li class="nav-item">
                            {{-- Musica/DAW/DAM --}}
                            <a class="nav-link" href="#projectes">Projectes</a>
                        </li>
                       
                        <li class="nav-item">
                            {{-- Xarxes Socials --}}
                            <a class="nav-link" href="#social">Social</a>
                        </li>
                        <li class="nav-item">
                            {{-- BTN Download CV --}}
                            <a class="nav-link" href="resources/CV_CAT_2019.pdf" download>CV</a>
                        </li>
                        {{-- Selector d'idioma + canvi de tema--}}
                        <li id="configuracio" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Configuració
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item btn" @click="modificarIdioma(0)">Català</a>
                                <a class="dropdown-item btn" @click="modificarIdioma(1)">Castellà</a>
                                <a class="dropdown-item btn" @click="modificarIdioma(2)">Anglés</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btn"  onclick="canviarcolor()">Canviar Tema</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
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