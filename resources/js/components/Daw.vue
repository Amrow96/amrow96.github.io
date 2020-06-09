<template>
  <main>
    <div class="row">
      <div class="col col-12 text-center">
        <div class="vh-100 d-flex justify-content-center">
          <div class="col mt-auto mb-auto">
            <div class="row">
              <div class="col">
                <h1 class="titulo">{{ textosMostrar[0].text }}</h1>
                <p>{{ textosMostrar[1].text }}</p>
              </div>
            </div>
            <div class="text-center row mt-3">
              <li class="list-unstyled" v-for="item in projectes" :key="item.titol">
                <ul>
                  <a :href="item.link" :alt="item.text">
                    {{
                    item.titol
                    }}
                  </a>
                </ul>
              </li>
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
        { referencia: "daw", numero: "14" },
        { referencia: "dawdesc", numero: "16" }
      ],
      textosCat: [],
      textosCast: [],
      textosEng: [],
      textosMostrar: [],

      projectes: [
        {
          titol: "Broogi",
          link: "https://www.loom.com/share/31b7d08e5cab4696a45ae9e39d27023f",
          text:
            "Enllaç a video explicatiu del Projecte realitzat per al institut Broggi per als estudiants de infermeria"
        },
        {
          titol: "API Ionic",
          link: "https://www.loom.com/share/d96d1fd4946e4114a9887fcf65cb927b",
          text:
            "Enllaç a video explicatiu del Projecte testejant una api amb ionic5"
        },
        {
          titol: "MNACTEC",
          link: "https://www.loom.com/share/8c42586c38904c408613019727766e63",
          text:
            "Enllaç a video explicatiu del Joc de Memory en moviment per al museu MNACTEC"
        },
        {
          titol: "Investigació Historia",
          link: "https://www.loom.com/share/c942081e4caf4c4aae20e4ced8e76eb5",
          text:
            "Enllaç a video explicatiu d'Investigació de l'Historia de les interficies"
        }
      ]
    };
  },
  created() {
    for (let item of this.paraula) {
      this.capturarTextos(item);
    }
  },
  mounted() {
    this.navegador();
  },
  methods: {
    navegador() {
      //Mostrem el navegador
      var navegador = document.getElementById("navegador");
      navegador.setAttribute("class", "visible container");
      //Amaguem els elements que no son els de configuració
      var navElements = document.querySelectorAll(".nav-item");
      navElements.forEach(function(navElement) {
        navElement.setAttribute("class", "invisible nav-item");
      });
      //Mostrem el element de configuracio

      var configuracio = document.getElementById("configuracio");
      configuracio.setAttribute("class", "visible nav-item");
      //Mostrem la ruta en la que estem
      var breadcrumb = document.getElementById("breadcrumb");
      breadcrumb.setAttribute("class", "visible breadcrumb");
      //creem el nou breadcrumb i l'afegim
      var anexo = document.createElement("LI");
      anexo.setAttribute("class", "breadcrumb-item active");
      anexo.setAttribute("aria-current", "page");
      anexo.innerText = "DAW";
      breadcrumb.appendChild(anexo);
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
    }
  }
};
</script>
