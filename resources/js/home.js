//Activarem el video quan estigui a l'alçada
var waypoint = new Waypoint({
    element: document.getElementById("app"),
    handler: function() {
        console.log("Scrolled to waypoint!");
    }
});
