function canviarcolor() {
    //Capturem el valor de la cookie actual

    var resultat = "";
    var name = "tema=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            resultat = c.substring(name.length, c.length);
        }
    }
    if (resultat !== "") {
        var d = new Date();
        d.setTime(d.getTime() + 2 * 24 * 60 * 60 * 1000);
        var expires = "expires=" + d.toUTCString();

        if (resultat == "light") {
            var cvalue = "dark";
        } else if (resultat == "dark") {
            var cvalue = "light";
        }
        document.cookie = "tema" + "=" + cvalue + ";" + expires + ";path=/";

        location.reload();
    } else {
        document.cookie = "tema=light" + ";" + expires + ";path=/";
    }
}
//Obtenim els botons d'idioma i modifiquem les cookies(codi als components)
