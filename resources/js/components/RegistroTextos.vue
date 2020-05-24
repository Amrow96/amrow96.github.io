<template>
  <main class="container">
    <div class="row col-12">
      <div class="col-12 text-center">
        <h1 class="text-center mt-5 mb-3 titulo">{{ textosMostrar[13].text }}</h1>
        <!-- El Filtro -->
        <b-input-group>
          <b-form-input
            class="row col-12"
            v-model="filter"
            type="search"
            id="filterInput"
            :placeholder="textosMostrar[11].text + '...'"
          ></b-form-input>
        </b-input-group>
        <!-- La Tabla -->
        <b-table
          fixed
          responsive
          caption-top
          ref="table"
          :current-page="currentPage"
          id="tablaIncidencies"
          :per-page="perPage"
          :items="resultat"
          :fields="columnasTabla"
          :filter="filter"
          :filterIncludedFields="filterOn"
          @filtered="onFiltered"
        >
          <template v-slot:cell(gestionar)="row">
            <b-button class="mr-1 col-12" @click="editText(row.item)">{{ textosMostrar[10].text }}</b-button>
          </template>
        </b-table>
        <!-- La Paginación -->
        <div class="row text-center">
          <b-pagination
            v-model="currentPage"
            :per-page="perPage"
            :total-rows="rows"
            aria-controls="tablaIncidencies"
          ></b-pagination>
        </div>
        <!-- Boto New Text -->
        <button
          type="button"
          @click="newText()"
          class="btn btn-primary btn-block"
        >{{ textosMostrar[9].text }}</button>
      </div>
      <!-- Modal Edit  -->
      <b-modal
        id="editTextModal"
        :title="textosMostrar[12].text"
        @ok="updateText(objectText.idtxt)"
        @hidden="cancelar()"
      >
        <form action method="put">
          <div class="row">
            <!-- Referencia -->
            <div class="col-12">
              {{ textosMostrar[8].text }}:
              <input
                v-model="objectText.txtref"
                class="form-control"
                name="txtref"
                type="text"
                :placeholder="textosMostrar[8].text"
              />
            </div>
            <!-- Català -->
            <div class="col-12">
              {{ textosMostrar[2].text }}:
              <input
                v-model="objectText.txtcat"
                class="form-control"
                type="text"
                name="txtcat"
                :placeholder="textosMostrar[2].text"
              />
            </div>
            <!-- Castellà -->
            <div class="col-12">
              {{ textosMostrar[3].text }}:
              <input
                v-model="objectText.txtcast"
                class="form-control"
                type="text"
                name="txtcast"
                :placeholder="textosMostrar[3].text"
              />
            </div>
            <!-- Anglés -->
            <div class="col-12">
              {{ textosMostrar[4].text }}:
              <input
                v-model="objectText.txteng"
                class="form-control"
                type="text"
                name="txteng"
                :placeholder="textosMostrar[4].text"
              />
            </div>
          </div>
        </form>
        <template v-slot:modal-footer>
          <b-button
            size="sm"
            variant="outline-primary"
            @click="cancelar()"
          >{{ textosMostrar[7].text }}</b-button>
          <!-- Button with custom close trigger value -->
          <b-button
            size="sm"
            variant="primary"
            @click="updateText(objectText.idtxt)"
          >{{ textosMostrar[6].text }}</b-button>
        </template>
      </b-modal>
      <!-- Modal Add -->
      <b-modal
        id="addTextModal"
        :title="textosMostrar[9].text"
        @ok="updateText(objectText.idtxt)"
        @hidden="cancelar()"
        class="modal-backdrop show"
      >
        <form action method="post">
          <div class="row">
            <!-- Referencia -->
            <div class="col-12">
              {{ textosMostrar[8].text }}:
              <input
                v-model="objectText.txtref"
                class="form-control"
                name="txtref"
                type="text"
                :placeholder="textosMostrar[8].text"
              />
            </div>
            <!-- Català -->
            <div class="col-12">
              {{ textosMostrar[2].text }}:
              <input
                v-model="objectText.txtcat"
                class="form-control"
                type="text"
                name="txtcat"
                :placeholder="textosMostrar[2].text"
              />
            </div>
            <!-- Castellà -->
            <div class="col-12">
              {{ textosMostrar[3].text }}:
              <input
                v-model="objectText.txtcast"
                class="form-control"
                type="text"
                name="txtcast"
                :placeholder="textosMostrar[3].text"
              />
            </div>
            <!-- Anglés -->
            <div class="col-12">
              {{ textosMostrar[4].text }}:
              <input
                v-model="objectText.txteng"
                class="form-control"
                type="text"
                name="txteng"
                :placeholder="textosMostrar[4].text"
              />
            </div>
          </div>
        </form>
        <template v-slot:modal-footer>
          <b-button
            size="sm"
            variant="outline-primary"
            @click="cancelar()"
          >{{ textosMostrar[7].text }}</b-button>
          <!-- Button with custom close trigger value -->
          <b-button size="sm" variant="primary" @click="storeText()">{{ textosMostrar[6].text }}</b-button>
        </template>
      </b-modal>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      resultat: [],
      paraula: [
        { referencia: "musica", numero: "17" },
        { referencia: "musicadesc", numero: "18" },
        { referencia: "cat", numero: "19" },
        { referencia: "cast", numero: "20" },
        { referencia: "eng", numero: "21" },
        { referencia: "aceptar", numero: "22" },
        { referencia: "guardar", numero: "23" },
        { referencia: "cancelar", numero: "24" },
        { referencia: "ref", numero: "25" },
        { referencia: "newtext", numero: "26" },
        { referencia: "edit", numero: "27" },
        { referencia: "buscar", numero: "28" },
        { referencia: "edittext", numero: "29" },
        { referencia: "textos", numero: "31" }
      ],
      textosCat: [],
      textosCast: [],
      textosEng: [],
      textosMostrar: [],
      objectText: {
        idtxt: null,
        txtref: "",
        txtcat: "",
        txtcast: "",
        txteng: ""
      },
      columnasTabla: [
        { key: "txtref", label: "Referencia Text" },
        { key: "txtcat", label: "Català" },
        { key: "txtcast", label: "Castellà" },
        { key: "txteng", label: "Anglès" },
        "gestionar"
      ],
      perPage: 5,
      currentPage: 1,
      filter: null,
      filterOn: []
    };
  },
  computed: {
    rows() {
      return this.resultat.length;
    }
  },
  created() {
    for (let item of this.paraula) {
      this.capturarTextos(item);
    }
    this.capturarTotsTextos();
    this.textosMostrar = [];
    this.modificarIdioma(0);
  },
  mounted() {},
  methods: {
    capturarTotsTextos() {
      let me = this;
      axios
        .get("/textos/")
        .then(function(response) {
          me.resultat = response.data.data;
          //cridar al metode que assigna els valors als arrays
        })
        .catch(error => console.log(error));
    },
    //Filtra a través del buscador
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    //Obre el modal enviantli el element seleciconat
    editText(item) {
      let me = this;
      me.objectText = item;
      this.$bvModal.show("editTextModal");
    },
    //Obre el modal per afegir un nou element
    newText() {
      let me = this;
      this.$bvModal.show("addTextModal");
    },
    // Modifica el element que estem editant
    updateText(idObjecte) {
      let me = this;
      //pasem el idobjecte i el objecte a modificar
      axios
        .put("/textos/" + idObjecte, this.objectText)
        .then(function(response) {
          me.mensajeEdit();
          me.capturarTotsTextos();
          me.cancelar();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    // guarda el element que hem creat
    storeText() {
      let me = this;
      //pasem el objecte a afegir
      console.log(this.objectText);

      axios
        .post("/textos", me.objectText)
        .then(function(response) {
          me.capturarTotsTextos();
          me.mensajeAdd();
          me.cancelar();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    // Mostra missatge de confirmacio
    mensajeAdd() {
      alert("Text afegit amb exit");
    },
    // Mostra missatge de confirmacio
    mensajeEdit() {
      alert("Text modificat amb exit");
    },
    //Tanca els modals
    cancelar() {
      this.$bvModal.hide("editTextModal");
      this.$bvModal.hide("addTextModal");
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
      this.modificarIdioma(0);
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

<style lang="scss" scoped>
.modal-content {
  width: 100% !important;
  position: absolute !important;
  top: 200px !important;
}
.mostrar {
  display: list-item !important;
  opacity: 0.1 !important;
  position: absolute !important;
  background-color: #00000077 !important;
}
form div {
  margin-bottom: 2rem;
}
</style>
