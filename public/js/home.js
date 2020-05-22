//Activarem el video quan estigui a l'alçada
const video = document.getElementById("videoPresentacio");
var waypoint = new Waypoint({
    element: video,
    handler: function() {
        console.log("Scrolled to waypoint!");
    }
});
//   var tema = getCookie("tema");
//   if (tema != "") {
//       //setejem el modo light, abans haurem de comprovar si es dark o light i en funcio d'aixo setejarem
//       if(tema="light"){ 
//           $style= "<style type=\"text/css\">#welcomeToCyanCoding {display:none;}</style>";
//         //  <link rel="stylesheet" href="{{ asset('css/bootstrapDark.css') }}">

//     alert("Welcome again " + username);
// } else {
// //   creem la cookie tema amb el modo dark
// username = prompt("Please enter your name:", "");
// if (username != "" && username != null) {
//     setCookie("username", username, 365);
// }
// };
  
// if(isset($_COOKIE["style"])) {
// $style= "<link rel=\"stylesheet\" href=\"{{ asset('css/bootstrapDark.css') }}\">";
// } else {
// $style= "<link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap.css') }}\">";
// setcookie("style=true", date("m/d/y"), time() + 10 * 365 * 24 * 60 * 60, "/");
// }
