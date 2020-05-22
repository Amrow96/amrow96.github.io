<!DOCTYPE html>
<?php
$nom="tema";
    if(isset($_COOKIE[$nom])) {
        if($_COOKIE[$nom]=="dark"){
            $style= "<link rel='stylesheet' href='css/bootstrapDark.css'>";
        }
        else{
            $style= "<link rel='stylesheet' href='css/bootstrap.css'>";
        }
    }else{$style= "<link rel='stylesheet' href='css/bootstrap.css'>";
    }
    ; ?>
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
<script>
  function canviarcolor(){
      //Capturem el valor de la cookie actual
      var resultat = "";
      var name = "tema=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            resultat= c.substring(name.length, c.length);
            }
        }
        if(resultat!==""){
            var d = new Date();
            d.setTime(d.getTime() + (2*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();

            if(resultat=="light"){
                var cvalue = "dark";
            } else if(resultat =="dark") {
                
                var cvalue = "light";
            }
            document.cookie = "tema" + "=" + cvalue + ";" + expires + ";path=/";    

            location.reload();
        }else{
                        document.cookie = "tema=light" + ";" + expires + ";path=/";    

        }


  }
</script>
</body>

</html>