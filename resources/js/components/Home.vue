<template>
  <main>
    <!-- Isotip + intntro -->
    <div class="row justify-content-center">
      <div class="row mt-3 col-12">
        <img
          width="100%"
          src="resources/img/IsotipoCirculo.svg"
          onerror="this.onerror=null; this.src='image.png'"
        />
      </div>
      <div class="text-center mt-3">
        <h1 class="titulo">{{ textosMostrar[0].text}}</h1>
        <h2 class="subtitulo">{{textosMostrar[1].text}}</h2>
      </div>

      <button class="btn" @click="modificarIdioma(0)">Traduir al Català</button>
      <button class="btn" @click="modificarIdioma(1)">Traduir al Castella</button>
      <button class="btn" @click="modificarIdioma(2)">Traduir al Anglés</button>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      textos: null,
      paraula: [
        { referencia: "descripcio", numero: "6" },
        { referencia: "controlAcces", numero: "1" }
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
      me.textosCat.push({ text: element.txtcat, referencia: element.txtref });
      me.textosCast.push({ text: element.txtcast, referencia: element.txtref });
      me.textosEng.push({ text: element.txteng, referencia: element.txtref });
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
    }
  }
};
</script>
