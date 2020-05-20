//Activarem el video quan estigui a l'alçada
const video = document.getElementById("videoPresentacio");
var waypoint = new Waypoint({
    element: video,
    handler: function() {
        console.log("Scrolled to waypoint!");
    }
});
