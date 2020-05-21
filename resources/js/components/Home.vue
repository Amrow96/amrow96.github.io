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
                  class="col-6"
                  src="resources/img/IsotipoCirculo.svg"
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
          <video id="videoPresentacio" class="col-12 alineamientoVertical" controls>
            <source src="resources/video/intro.mp4#t=30,55" type="video/mp4" />
          </video>
        </div>
        <!-- Cards  -->
        <div class="vh-100">
          <div class="row alineamientoVertical">
            <div class="col col-12">
              <div class="card-deck mb-3">
                <div class="card" @click="openMusica()">
                  <img class="card-img-top" src alt="Card image cap" />
                  <div class="card-body">
                    <h5 class="card-header titulo">{{ textosMostrar[2].text }}</h5>
                    <p class="card-text">{{ textosMostrar[3].text }}</p>
                  </div>
                </div>
                <div class="card" @click="openDAM()">
                  <img class="card-img-top" src alt="Card image cap" />
                  <div class="card-body">
                    <h5 class="card-header titulo">{{ textosMostrar[4].text }}</h5>
                    <p class="card-text">{{ textosMostrar[5].text }}</p>
                  </div>
                </div>
                <div class="card" @click="openDAW()">
                  <img class="card-img-top" src alt="Card image cap" />
                  <div class="card-body">
                    <h5 class="card-header titulo">{{ textosMostrar[6].text }}</h5>
                    <p class="card-text">{{ textosMostrar[7].text }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
        <div class="row col-12">
          <button class="btn col-4" @click="modificarIdioma(0)">Traduir al Català</button>
          <button class="btn col-4" @click="modificarIdioma(1)">Traduir al Castella</button>
          <button class="btn col-4" @click="modificarIdioma(2)">Traduir al Anglés</button>
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
        { referencia: "dawdesc", numero: "16" }
      ],

      textosCat: [],
      textosCast: [],
      textosEng: [],
      textosMostrar: []
    };
  },
  created() {
    for (let item of this.paraula) {
      this.capturarTextos(item);
    }
    this.textosMostrar = [];
    this.modificarIdioma(0);
  },
  mounted() {},
  methods: {
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
      // let i = 0; //Busquem la posició en la que esta aquesta referencia

      // let trobat = false;
      // if (!trobat) {
      //   for (let item of me.paraula) {
      //     if (item.referencia === id.referencia) {
      //       //obtenim la posicio de la paraula buscada i setejar-la a la posició de la paraula per evitar problemes d'indexació al carregar

      //       me.textosCat[i] = {
      //         text: element.txtcat,
      //         referencia: element.txtref
      //       };
      //       me.textosCast[i] = {
      //         text: element.txtcast,
      //         referencia: element.txtref
      //       };

      //       me.textosEng[i] = {
      //         text: element.txteng,
      //         referencia: element.txtref
      //       };
      //       trobat = true; //Comprovant per sortir del bucle
      //     }

      //     i++;
      //   }
      // }
      me.textosCat.push({
        text: element.txtcat,
        referencia: element.txtref
      });
      me.textosCast.push({
        text: element.txtcast,
        referencia: element.txtref
      });
      me.textosEng.push({
        text: element.txteng,
        referencia: element.txtref
      });
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
      }
    },
    videoselector() {
      var mediaElement = document.getElementById("videoPresentacio");
      mediaElement.seekable.start(30); // Returns the starting time (in seconds)
      mediaElement.seekable.end(); // Returns the ending time (in seconds)
      mediaElement.currentTime = 122; // Seek to 122 seconds
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
