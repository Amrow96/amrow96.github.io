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
                        }"
                />
              </div>
            </div>
            <div class="text-center row mt-3">
              <div class="col">
                <h1 v-if="textosMostrar[0].text" class="titulo">{{ textosMostrar[0].text }}</h1>
                <h2 v-if="textosMostrar[1].text" class="subtitulo">{{ textosMostrar[1].text }}</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Video -->
      <div id="about" class="espaciadotop">
        <div class="titulo mt-1">{{ textosMostrar[13].text }}</div>
        <hr />
        <div class="row d-flex justify-content-center">
          <video
            id="videoPresentacio"
            class="col-12"
            controls
            v-waypoint="{
                            active: true,
                            callback: onWaypoint,
                        }"
          >
            <source id="contenidoVideo" :src="direccioVideo" type="video/mp4" />
            <track
              src="resources/video/subtitulosCatala.vtt"
              kind="subtitles"
              srclang="cat"
              label="Català"
            />
            <track
              src="resources/video/subtitulosCastellano.vtt"
              kind="subtitles"
              srclang="es"
              label="Castellano"
            />
            <track
              src="resources/video/subtitulosIngles.vtt"
              kind="subtitles"
              srclang="eng"
              label="English"
            />
          </video>
          <div id="botonera" class="d-flex justify-content-center"></div>
        </div>
      </div>
      <!-- Dafo -->
      <div id="analisis" class="espaciadotop">
        <div v-if="textosMostrar[11].text" class="titulo mt-1">{{ textosMostrar[11].text }}</div>
        <hr />
        <div class="text-center row">
          <div class="col">
            <h1 v-if="textosMostrar[9].text" class="titulo">{{ textosMostrar[9].text }}</h1>
            <h4 v-if="textosMostrar[8].text">{{ textosMostrar[8].text }}</h4>
          </div>
        </div>
      </div>
      <!-- Skills -->
      <div id="skills" class="espaciadotop">
        <div v-if="textosMostrar[14].text" class="titulo mt-1">{{ textosMostrar[14].text }}</div>
        <hr />
        <div class="text-center row">
          <div class="col card">
            <ul class="list-group list-group-flush">
              <li class="list-group-item" v-for="item in habilidades" :key="item.id_habilidad">
                <ul>
                  <li>{{ item.nombre }}: {{item.niveles.descripcion}} , {{ item.id_nivel }} ☆</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Cards  -->
      <div id="projectes" class="espaciadotop mb-5">
        <div v-if="textosMostrar[12].text" class="titulo mt-1">{{ textosMostrar[12].text }}</div>
        <hr />
        <div class="row">
          <div class="col col-12">
            <div class="card-deck mb-3">
              <div class="card btn" @click="openMusica()">
                <div class="card-body">
                  <h5 class="titulo" v-if="textosMostrar[2].text">{{ textosMostrar[2].text }}</h5>
                  <p class="card-text" v-if="textosMostrar[3].text">{{ textosMostrar[3].text }}</p>
                </div>
              </div>
              <div class="card btn" @click="openDAM()">
                <div class="card-body">
                  <h5 class="titulo" v-if="textosMostrar[4].text">{{ textosMostrar[4].text }}</h5>
                  <p class="card-text" v-if="textosMostrar[5].text">{{ textosMostrar[5].text }}</p>
                </div>
              </div>
              <div class="card btn" @click="openDAW()">
                <div class="card-body">
                  <h5 class="titulo" v-if="textosMostrar[6].text">{{ textosMostrar[6].text }}</h5>
                  <p class="card-text" v-if="textosMostrar[7].text">{{ textosMostrar[7].text }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <div id="social" class="col-12">
        <div class="row col-8 offset-2">
          <div class="btn col-4">
            <a href="https://twitter.com/pautrompeta" class="twitter">
              <i class="fa fa-twitter"></i>
            </a>
          </div>
          <div class="btn col-4">
            <a href="https://www.linkedin.com/in/pau-g-60268984/" class="linkedin">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
          <div class="btn col-4">
            <a href="https://instagram.com/pautrompeta" class="instagram">
              <i class="fa fa-instagram"></i>
            </a>
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
        { referencia: "nompau", numero: 3 },
        { referencia: "descripcio", numero: 6 },
        { referencia: "musica", numero: 17 },
        { referencia: "musicadesc", numero: 18 },
        { referencia: "dam", numero: 13 },
        { referencia: "damdesc", numero: 15 },
        { referencia: "daw", numero: 14 },
        { referencia: "dawdesc", numero: 16 },
        { referencia: "dafo", numero: 30 },
        { referencia: "dafonom", numero: 33 },
        { referencia: "canviartema", numero: 34 },
        { referencia: "analisis", numero: 35 },
        { referencia: "projecte", numero: 36 },
        { referencia: "about", numero: 37 },
        { referencia: "skills", numero: 38 }
      ],
      habilidades: [],
      textosCat: [],
      textosCast: [],
      textosEng: [],
      textosMostrar: [
        { referencia: "nompau", text: "Pau Gonzàlez Martí" },
        {
          referencia: "descripcio",
          text: "Benvingut al meu portfolio personal."
        },
        { referencia: "musica", text: "Música" },
        {
          referencia: "musicadesc",
          text:
            "A part de la programació sóc músic, trompetista, i m'hi dedico de manera professional, ja que aquest any no podré fer gaires concerts et deixo aquí un petit recopilatori"
        },
        { referencia: "dam", text: "DAM" },
        {
          referencia: "damdesc",
          text:
            "Fent DAM vaig poder treballar amb un munt de llenguatges i frameworks com ara C#, C++, Java, Kotlin, SQL, Android Studio, .Net i de més. També vaig tenir una primera presa de contacte amb les APIs, Backend i en definitiva la programacio orientada a objectes."
        },
        { referencia: "daw", text: "DAW" },
        {
          referencia: "dawdesc",
          text:
            "Fent DAW he canviat de paradigma, guanyant un nou punt de vista i coneixent un munt d'eines noves, com Angular, Ionic, Laravel, PHP, Vue, Bootstrap i moltes altres, també ens hem enfocat en el disseny i psicologia del usuari i aquesta web es el resultat del que he aprés aqui."
        },
        {
          referencia: "dafo",
          text:
            "Com a punts forts, m'adapto ràpid a les situacions, treballo bé sota pressió i m'agrada el treball en equip, però per contra, tinc una forta autocritica i sóc molt perfeccionista"
        },
        { referencia: "dafonom", text: "DAFO" },
        { referencia: "canviartema", text: "Canviar Tema" }
      ],
      direccioVideo: "resources/video/intro.mp4",
      img: "resources/img/IsotipoCirculo.svg"
    };
  },

  mounted() {
    this.capturarTot();

    this.imagen();
    this.videoselector();
    var cookiDate = new Date(2020, 11, 24);
    document.cookie = "paginavisitada=; expires=" + cookiDate.toUTCString();
    this.capturarHabilitats();
  },
  methods: {
    //Detectem quan estem veient el video i el reproduim
    onWaypoint({ going, direction }) {
      if (direction === this.$waypointMap.DIRECTION_TOP) {
        var mediaElement = document.getElementById("videoPresentacio");
        var contenido = document.getElementById("contenidoVideo");
        //Només posarem play la primera vegada
        if (mediaElement.currentTime == 0) {
          mediaElement.play();
        }
        //Mirem que s'hagui acabat el video
        mediaElement.onended = function() {
          // console.log("estem mostrant el src del video acabat", contenido.getAttribute("src"));
          if (contenido.getAttribute("src") === "resources/video/dam.mp4") {
            //Si el video ve dels cicles mostrem boto twiter
            var btnTwitter = document.createElement("BUTTON");
            btnTwitter.setAttribute("class", "btn-primary btn ");
            btnTwitter.setAttribute(
              "href",
              "https://twitter.com/PauTrompeta_Dev"
            );
            btnTwitter.innerText = "Twitter";
            var padre = document.getElementById("botonera");
            padre.appendChild(btnTwitter);
          } else if (
            contenido.getAttribute("src") === "resources/video/daw.mp4"
          ) {
            //Si el video ve dels cicles mostrem boto twiter
            var btnTwitter = document.createElement("BUTTON");
            btnTwitter.setAttribute("class", "btn-primary btn");
            btnTwitter.setAttribute(
              "href",
              "https://twitter.com/PauTrompeta_Dev"
            );
            btnTwitter.innerText = "Twitter";
            var padre = document.getElementById("botonera");
            padre.appendChild(btnTwitter);
          } else if (
            contenido.getAttribute("src") === "resources/video/musica.mp4"
          ) {
            //Si ve de musica mostrem boto insta;
            var btnInsta = document.createElement("BUTTON");
            btnInsta.setAttribute("class", "btn-primary btn ");
            btnInsta.setAttribute(
              "href",
              "https://www.instagram.com/kliuoficial/"
            );
            btnInsta.innerText = "Instagram";
            var padre = document.getElementById("botonera");
            padre.appendChild(btnInsta);
          }
        };
        var onetime = true;
        mediaElement.ontimeupdate = function() {
          if (mediaElement.currentTime >= 50) {
            if (onetime === true) {
              var padre = document.getElementById("botonera");
              var videoA = document.createElement("BUTTON");
              videoA.setAttribute("class", "btn-primary btn mr-auto ml-auto");
              videoA.onclick = function() {
                var mediaElement = document.getElementById("videoPresentacio");
                mediaElement.currentTime = 251;
                mediaElement.play();
              };
              videoA.innerText = "Sintaxis";

              var videoB = document.createElement("BUTTON");
              videoB.setAttribute("class", "btn-primary btn ");
              videoB.onclick = function() {
                var mediaElement = document.getElementById("videoPresentacio");
                mediaElement.currentTime = 61;
                mediaElement.play();
                var vist = true;
                mediaElement.ontimeupdate = function() {
                  if (mediaElement.currentTime >= 251) {
                    if (vist === true) {
                      mediaElement.pause();
                      vist = false;
                    }
                  }
                };
              };
              videoB.innerText = "Historia";

              padre.appendChild(videoA);
              padre.appendChild(videoB);
              onetime = false;
            }
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
    capturarHabilitats() {
      let me = this;
      axios
        .get("/habilidades/") //Busquem amb el me.paraules un element en concret a través del numero = id
        .then(function(response) {
          //cridar al metode que assigna els valors als arrays
          me.habilidades = response.data.data;
        })
        .catch(error => console.log(error));
    }, //Fem la petició a la api
    capturarTot() {
      let me = this;
      axios
        .get("/textos/") //Busquem amb el me.paraules un element en concret a través del numero = id
        .then(function(response) {
          //cridar al metode que assigna els valors als arrays
          me.assignarTextos(response.data.data);
        })
        .catch(error => console.log(error));
    },
    //Tractem el text per treballar-lo millor
    assignarTextos(element) {
      // pasem el resultat de la request i la referencia interna que hem utilitzat
      console.log("capturem :", element);

      let me = this;
      let i = 0; //Busquem la posició en la que esta aquesta referencia
      try {
        for (let item of me.paraules) {
          for (let paraula of element) {
            if (item.numero === paraula.idtxt) {
              //obtenim la posicio de la paraules buscada i setejar-la a la posició de la paraules per evitar problemes d'indexació al carregar

              me.textosCat[i] = {
                text: paraula.txtcat,
                referencia: paraula.txtref
              };
              me.textosCast[i] = {
                text: paraula.txtcast,
                referencia: paraula.txtref
              };

              me.textosEng[i] = {
                text: paraula.txteng,
                referencia: paraula.txtref
              };
              i++;
            }
          }
        }
      } catch (e) {
        console.log("error capturat", e);
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
      // console.log("estem modificant el video");
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
          element = "intro.mp4#t=0,60";
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
