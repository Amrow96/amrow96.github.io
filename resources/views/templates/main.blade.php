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