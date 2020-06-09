<template>
  <main>
    <div class="row">
      <div class="col col-12 text-center">
        <!-- Isotip + intro -->
        <div class="vh-100">
          <div class="alineamientoVertical">
            <div class="row">
              <div class="col">
                <img
                  onclick="canviarcolor()"
                  class="col-6"
                  :src="img"
                  alt="Isotipo personal"
                  v-waypoint="{
                            active: true,
                            callback: logo,
                            options: intersectionOptions
                        }"
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
        <div id="about" class>
          <div class="text-center row mt-3">
            <div class="row d-flex justify-content-center">
              <a
                id="btnInsta"
                class="invisible btn-secondary btn mt-auto mb-auto"
                href="https://www.instagram.com/kliuoficial/"
              >Instagram</a>
              <a
                id="btnTwitter"
                class="invisible btn-secondary btn mt-auto mb-auto"
                href="https://twitter.com/PauTrompeta_Dev"
              >Twitter</a>

              <video
                id="videoPresentacio"
                class="col-12"
                controls
                v-waypoint="{
                            active: true,
                            callback: onWaypoint,
                            options: intersectionOptions
                        }"
              >
                <source id="contenidoVideo" :src="direccioVideo" type="video/mp4" />
              </video>
            </div>
          </div>
        </div>
        <!-- Dafo -->
        <div id="analisis" class="vh-100 d-flex justify-content-center">
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
        <div id="projectes">
          <div class="row alineamientoVertical">
            <div class="col col-12">
              <div class="card-deck mb-3">
                <div class="card btn" @click="openMusica()">
                  <div class="card-body">
                    <h5 class="titulo">{{ textosMostrar[2].text }}</h5>
                    <p class="card-text">{{ textosMostrar[3].text }}</p>
                  </div>
                </div>
                <div class="card btn" @click="openDAM()">
                  <div class="card-body">
                    <h5 class="titulo">{{ textosMostrar[4].text }}</h5>
                    <p class="card-text">{{ textosMostrar[5].text }}</p>
                  </div>
                </div>
                <div class="card btn" @click="openDAW()">
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
        <div id="social" class="page-footer">
          <div class="row alineamientoVertical">
            <div class="col col-12">
              <div class="row mb-4 col-12">
                <button class="btn col-3" onclick="canviarcolor()">{{ textosMostrar[10].text }}</button>
                <button class="btn col-3" @click="modificarIdioma(0)">Traduir al Català</button>
                <button class="btn col-3" @click="modificarIdioma(1)">Traducir al Castellano</button>
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
      paraules: [
        { referencia: "nompau", numero: "3" },
        { referencia: "descripcio", numero: "6" },
        { referencia: "musica", numero: "17" },
        { referencia: "musicadesc", numero: "18" },
        { referencia: "dam", numero: "13" },
        { referencia: "damdesc", numero: "15" },
        { referencia: "daw", numero: "14" },
        { referencia: "dawdesc", numero: "16" },
        { referencia: "dafo", numero: "30" },
        { referencia: "dafonom", numero: "33" },
        { referencia: "canviartema", numero: "34" }
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
    for (let item of this.paraules) {
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
        var contenido = document.getElementById("contenidoVideo");
        mediaElement.play();
        //Mirem que s'hagui acabat el video
        mediaElement.onended = function() {
          // console.log("estem mostrant el src del video acabat", contenido.getAttribute("src"));
          if (
            contenido.getAttribute("src") ===
            ("resources/video/dam.mp4" || "resources/video/daw.mp4")
          ) {
            //Si el video ve dels cicles mostrem boto twiter
            var btnTwitter = document.getElementById("btnTwitter");
            btnTwitter.setAttribute(
              "class",
              "visible btn-primary btn  mt-auto mb-auto"
            );
          } else if (
            contenido.getAttribute("src") === "resources/video/musica.mp4"
          ) {
            //Si ve de musica mostrem boto insta;
            var btnInsta = document.getElementById("btnInsta");
            btnInsta.setAttribute(
              "class",
              "visible btn-primary btn  mt-auto mb-auto"
            );
          }
        };
      }
    },
    logo({ going, direction }) {
      if (going === this.$waypointMap.GOING_OUT) {
        var navegador = document.getElementById("navegador");
        navegador.setAttribute("class", "visible container");
      } else if (going === this.$waypointMap.GOING_IN) {
        var navegador = document.getElementById("navegador");
        navegador.setAttribute("class", "invisible container");
      }
    },
    //Funció per obtenir el contingut d'una cookie
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
    //Fem la petició a la api
    capturarTextos(id) {
      let me = this;
      axios
        .get("/textos/" + id.numero) //Busquem amb el me.paraules un element en concret a través del numero = id
        .then(function(response) {
          let text = response.data.data;
          //cridar al metode que assigna els valors als arrays
          me.assignarTextos(text, id);
        })
        .catch(error => console.log(error));
    },
    //Tractem el text per treballar-lo millor
    assignarTextos(element, id) {
      // pasem el resultat de la request i la referencia interna que hem utilitzat
      let me = this;
      let i = 0; //Busquem la posició en la que esta aquesta referencia

      let trobat = false;
      if (!trobat) {
        for (let item of me.paraules) {
          if (item.referencia === id.referencia) {
            //obtenim la posicio de la paraules buscada i setejar-la a la posició de la paraules per evitar problemes d'indexació al carregar

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
      //Modifiquem l'idioma amb el idioma que tenim guardat a la cookie
      this.modificarIdioma(Number.parseInt(this.getCookie("idioma")));
    },
    //Modifica l'idioma a partir d'un id
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
          //De no tenir cap cookie creada, assignem el idioma standard al castellà i assignem el id per crear la cookie
          me.textosMostrar = me.textosCast;
          id = 1;
          break;
      }

      var cookiDate = new Date(2020, 11, 24);
      document.cookie = "idioma=" + id + "; expires=" + cookiDate.toUTCString();
    },
    // asignarem un video depenent de la cookie
    videoselector() {
      //detectem de quina pagina ve i mostrem un video en funció d'aquest
      let element = null;
      console.log("estem modificant el video");
      let descripcio = "";
      let origen = this.getCookie("paginavisitada");
      // console.log("estem mostrant la cookie", origen);
      switch (origen) {
        case "musica":
          element = "musica.mp4";
          descripcio =
            "Video personalitzat a partir de que has vist el contingut de musica";
          break;
        case "dam":
          element = "dam.mp4";
          descripcio =
            "Video personalitzat a partir de que has vist el contingut de dam";
          break;
        case "daw":
          element = "daw.mp4";
          descripcio =
            "Video personalitzat a partir de que has vist el contingut de daw";
          break;
        default:
          element = "intro.mp4";
          descripcio =
            "Video presentació de qui soc i que es el que estas veient";
          break;
      }
      //Assignem una descripció adequada a cada video
      // document.getElementById("videoPresentacio").setAttribute("alt", descripcio);
      var baseSrc = "resources/video/" + element; //+ "#t=30,55";//Si volguessim talar per un minut en concret //separem la direcció a través dels parametres
      this.direccioVideo = baseSrc;
    },
    //Obtenim la ruta de la imatge que canviarà en funció del tema
    imagen() {
      this.img = document.getElementById("ruta").getAttribute("desc");
    },
    //Redireccións
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
