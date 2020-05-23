<template>
  <main>
    <div class="row">
      <div class="col col-12 text-center">
        <!-- Isotip + intntro -->
        <div class="vh-100">
          <div class="alineamientoVertical">
            <div class="row">
              <div class="col">
                <img
                  onclick="canviarcolor()"
                  class="col-6"
                  :src="img"
                  onerror="this.onerror=null; this.src='image.png'"
                />
              </div>
            </div>
            <div class="text-center row mt-3">
              <div class="col">
                <h1 class="titulo">{{ textosMostrar[0].text }}</h1>
                <h2 class="subtitulo">{{ textosMostrar[1].text }}</h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Video -->
        <div class="vh-100">
          <video
            id="videoPresentacio"
            class="col-12 alineamientoVertical"
            controls
            v-waypoint="{
                            active: true,
                            callback: onWaypoint,
                            options: intersectionOptions
                        }"
          >
            <source :src="direccioVideo" type="video/mp4" />
          </video>
        </div>
        <!-- Dafo -->
        <div class="vh-100 d-flex justify-content-center">
          <div class="alineamientoVertical">
            <div class="text-center row mt-3">
              <div class="col">
                <h1 class="titulo">{{ textosMostrar[9].text }}</h1>
                <h4>{{ textosMostrar[8].text }}</h4>
              </div>
            </div>
          </div>
        </div>
        <!-- Cards  -->
        <div class="vh-100">
          <div class="row alineamientoVertical">
            <div class="col col-12">
              <div class="card-deck mb-3">
                <div class="card" @click="openMusica()">
                  <div class="card-body">
                    <h5 class="titulo">{{ textosMostrar[2].text }}</h5>
                    <p class="card-text">{{ textosMostrar[3].text }}</p>
                  </div>
                </div>
                <div class="card" @click="openDAM()">
                  <div class="card-body">
                    <h5 class="titulo">{{ textosMostrar[4].text }}</h5>
                    <p class="card-text">{{ textosMostrar[5].text }}</p>
                  </div>
                </div>
                <div class="card" @click="openDAW()">
                  <div class="card-body">
                    <h5 class="titulo">{{ textosMostrar[6].text }}</h5>
                    <p class="card-text">{{ textosMostrar[7].text }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <footer class="page-footer font-small blue pt-4">
          <!-- Copyright -->
          <div class="footer-copyright text-center py-3"></div>
          <div class="text-right"></div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <div class="page-footer">
          <div class="row alineamientoVertical">
            <div class="col col-12">
              <div class="row col-12">
                <button class="btn col-3" onclick="canviarcolor()">Cambiar el Tema</button>
                <button class="btn col-3" @click="modificarIdioma(0)">Traduir al Català</button>
                <button class="btn col-3" @click="modificarIdioma(1)">Traduir al Castellano</button>
                <button class="btn col-3" @click="modificarIdioma(2)">Translate to Anglés</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      paraula: [
        { referencia: "nompau", numero: "3" },
        { referencia: "descripcio", numero: "6" },
        { referencia: "musica", numero: "17" },
        { referencia: "musicadesc", numero: "18" },
        { referencia: "dam", numero: "13" },
        { referencia: "damdesc", numero: "15" },
        { referencia: "daw", numero: "14" },
        { referencia: "dawdesc", numero: "16" },
        { referencia: "dafo", numero: "30" },
        { referencia: "dafonom", numero: "33" }
      ],

      textosCat: [],
      textosCast: [],
      textosEng: [],
      textosMostrar: [],
      img: "",
      direccioVideo: ""
    };
  },
  created() {
    for (let item of this.paraula) {
      this.capturarTextos(item);
    }
    this.imagen();
  },
  mounted() {
    this.videoselector();
  },
  methods: {
    //Detectem quan estem veient el video i el reproduim
    onWaypoint({ going, direction }) {
      if (going === this.$waypointMap.GOING_IN) {
        var mediaElement = document.getElementById("videoPresentacio");
        mediaElement.play();
      }
    },
    capturarTextos(id) {
      let me = this;
      axios
        .get("/textos/" + id.numero) //Busquem amb el me.paraula un element en concret a través del numero = id
        .then(function(response) {
          let text = response.data.data;
          //cridar al metode que assigna els valors als arrays
          me.assignarTextos(text, id);
        })
        .catch(error => console.log(error));
    },
    assignarTextos(element, id) {
      // pasem el resultat de la request i la referencia interna que hem utilitzat
      let me = this;
      let i = 0; //Busquem la posició en la que esta aquesta referencia

      let trobat = false;
      if (!trobat) {
        for (let item of me.paraula) {
          if (item.referencia === id.referencia) {
            //obtenim la posicio de la paraula buscada i setejar-la a la posició de la paraula per evitar problemes d'indexació al carregar

            me.textosCat[i] = {
              text: element.txtcat,
              referencia: element.txtref
            };
            me.textosCast[i] = {
              text: element.txtcast,
              referencia: element.txtref
            };

            me.textosEng[i] = {
              text: element.txteng,
              referencia: element.txtref
            };
            trobat = true; //Comprovant per sortir del bucle
          }

          i++;
        }
      }
      this.textosMostrar = [];

      this.modificarIdioma(Number.parseInt(this.getCookie("idioma")));
    },
    getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(";");
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    },
    modificarIdioma(id) {
      let me = this;

      switch (id) {
        case 0:
          me.textosMostrar = me.textosCat;
          break;

        case 1:
          //   console.log("Acabem de cambiar de:", me.textosMostrar[0].text);
          me.textosMostrar = me.textosCast;
          break;

        //console.log("Acabem de cambiar a:", me.textosMostrar[0].text);
        case 2:
          me.textosMostrar = me.textosEng;
          break;
        default:
          me.textosMostrar = me.textosCat;
          id = 0;
          break;
      }

      var cookiDate = new Date(2020, 11, 24);
      document.cookie = "idioma=" + id + "; expires=" + cookiDate.toUTCString();
    },
    videoselector() {
      //detectem de quina pagina ve i mostrem un video en funció d'aquest
      let element = "intro.mp4";

      let origen = this.getCookie("paginavisitada");
      console.log("estem mostrant la cookie", origen);
      switch (origen) {
        case "musica":
          element = "musica.mp4";
          break;
        case "dam":
          element = "dam.mp4";
          break;
        case "daw":
          element = "daw.mp4";
          break;
        default:
          element = "intro.mp4";
          break;
      }
      var baseSrc = "resources/video/" + element; //+ "#t=30,55";//Si volguessim talar per un minut en concret //separem la direcció a través dels parametres
      this.direccioVideo = baseSrc;
    },
    imagen() {
      this.img = document.getElementById("ruta").getAttribute("desc");
    },
    openMusica() {
      window.location.href = "musica";
    },
    openDAW() {
      window.location.href = "daw";
    },
    openDAM() {
      window.location.href = "dam";
    }
  }
};
</script>
