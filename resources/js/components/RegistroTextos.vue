<template>
  <main class="container">
    <div class="row col-12">
      <div class="col-12 text-center">
        <h1 class="text-center mb-5">Textos</h1>
        <!-- El Filtro -->
        <b-input-group>
          <b-form-input
            class="row col-12"
            v-model="filter"
            type="search"
            id="filterInput"
            :placeholder="textos.buscar[idioma] + '...'"
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
            <b-button class="mr-1 col-12" @click="editText(row.item)">{{ textos.editar[idioma] }}</b-button>
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
        >{{ textos.afegirIncidencia[idioma] }}</button>
      </div>
      <!-- Modal Edit  -->
      <b-modal
        id="editTextModal"
        :title="textos.editarIncidencia[idioma]"
        @ok="updateText(objectText.idtxt)"
        @hidden="cancelar()"
      >
        <form action method="put">
          <div class="row">
            <!-- Referencia -->
            <div class="col-12">
              {{ textos.numeroIncidencia[idioma] }}:
              <input
                v-model="objectText.txtref"
                class="form-control"
                name="txtref"
                type="text"
                :placeholder="textos.numeroIncidencia[idioma]"
              />
            </div>
            <!-- Català -->
            <div class="col-12">
              {{ textos.telefon[idioma] }}:
              <input
                v-model="objectText.txtcat"
                class="form-control"
                type="text"
                name="txtcat"
                :placeholder="textos.telefon[idioma]"
              />
            </div>
            <!-- Castellà -->
            <div class="col-12">
              {{ textos.adreca[idioma] }}:
              <input
                v-model="objectText.txtcast"
                class="form-control"
                type="text"
                name="txtcast"
                :placeholder="textos.adreca[idioma]"
              />
            </div>
            <!-- Anglés -->
            <div class="col-12">
              {{ textos.adreca[idioma] }}:
              <input
                v-model="objectText.txteng"
                class="form-control"
                type="text"
                name="txteng"
                :placeholder="textos.adreca[idioma]"
              />
            </div>
          </div>
        </form>
        <template v-slot:modal-footer>
          <b-button
            size="sm"
            variant="outline-primary"
            @click="cancelar()"
          >{{ textos.cancelar[idioma] }}</b-button>
          <!-- Button with custom close trigger value -->
          <b-button
            size="sm"
            variant="primary"
            @click="updateText(objectText.idtxt)"
          >{{ textos.guardar[idioma] }}</b-button>
        </template>
      </b-modal>
      <!-- Modal Add -->
      <b-modal
        id="addTextModal"
        :title="textos.editarIncidencia[idioma]"
        @ok="updateText(objectText.idtxt)"
        @hidden="cancelar()"
      >
        <form action method="post">
          <div class="row">
            <!-- Referencia -->
            <div class="col-12">
              {{ textos.numeroIncidencia[idioma] }}:
              <input
                v-model="objectText.txtref"
                class="form-control"
                name="txtref"
                type="text"
                :placeholder="textos.numeroIncidencia[idioma]"
              />
            </div>
            <!-- Català -->
            <div class="col-12">
              {{ textos.telefon[idioma] }}:
              <input
                v-model="objectText.txtcat"
                class="form-control"
                type="text"
                name="txtcat"
                :placeholder="textos.telefon[idioma]"
              />
            </div>
            <!-- Castellà -->
            <div class="col-12">
              {{ textos.adreca[idioma] }}:
              <input
                v-model="objectText.txtcast"
                class="form-control"
                type="text"
                name="txtcast"
                :placeholder="textos.adreca[idioma]"
              />
            </div>
            <!-- Anglés -->
            <div class="col-12">
              {{ textos.adreca[idioma] }}:
              <input
                v-model="objectText.txteng"
                class="form-control"
                type="text"
                name="txteng"
                :placeholder="textos.adreca[idioma]"
              />
            </div>
          </div>
        </form>
        <template v-slot:modal-footer>
          <b-button
            size="sm"
            variant="outline-primary"
            @click="cancelar()"
          >{{ textos.cancelar[idioma] }}</b-button>
          <!-- Button with custom close trigger value -->
          <b-button size="sm" variant="primary" @click="storeText()">{{ textos.guardar[idioma] }}</b-button>
        </template>
      </b-modal>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      idioma: 0,
      resultat: [],
      textos: {
        gestioIncidencies: [
          "Gestió d'Incidencies",
          "Gestión de Incidencias",
          "Incidents Management"
        ],
        buscar: ["Buscar", "Buscar", "Search"],
        buscador: ["Buscador", "Buscador", "Browser"],
        editar: ["Editar", "Editar", "Edit"],
        afegirIncidencia: [
          "Afegir Incidencia",
          "Añadir Incidencia",
          "Add Incidence"
        ],
        editarIncidencia: [
          "Editar Incidencia",
          "Editar Incidencia",
          "Edit Incidence"
        ],
        numeroIncidencia: [
          "Numero d'Incidencia",
          " Numero de Incidencia",
          "Incidence Number"
        ],
        hora: ["Hora", "Hora", "Hour"],
        fecha: ["Data", "Fecha", "Date"],
        cancelar: ["Cancelar", "Cancelar", "Cancel"],
        guardar: ["Guardar", "Guardar", "Save"],
        telefon: [
          "Telèfon de l'Alertant",
          "Telefono del Alertante",
          "Alerting Phone"
        ],
        municipi: ["Municipi", "Municipio", "Town"],
        adreca: ["Adreça", "Dirección", "Address"],
        compAdreca: [
          "Complement d'Adreça",
          "Complemento de Dirección",
          "Add-on Address"
        ],
        tipusAlertant: [
          "Tipus d'Alertant",
          "Tipo de Alertant:",
          "Alerter's Type"
        ],
        alertant: ["Alertant", "Alertante", "Alerter"],
        estatIncidencia: [
          "Estat de l'Incidencia",
          "Estado de la incidencia",
          "Incidence Status"
        ],
        tipusIncidencia: [
          "Tipus d'Incidencia",
          "Tipo de incidencia",
          "Incidence Type"
        ],
        descripcio: ["Descripció", "Descripción", "Description"]
      },
      objectText: {
        idtxt: "",
        txtref: "",
        txtcat: "",
        txtcast: "",
        txteng: ""
      },
      columnasTabla: [
        { key: "txtref", label: "Referencia Text" },
        { key: "txtcat", label: "Català" },
        { key: "txtcast", label: "Castellà" },
        { key: "txteng", label: "Anglés" },
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
    this.capturarTextos();
  },
  methods: {
    capturarTextos() {
      let me = this;
      axios
        .get("/textos") //Busquem amb el me.paraula un element en concret a través del numero = id
        .then(function(response) {
          me.resultat = response.data.data;
          //cridar al metode que assigna els valors als arrays
        })
        .catch(error => console.log(error));
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
    editText(item) {
      let me = this;
      me.objectText = item;
      this.$bvModal.show("editTextModal");
    },
    newText() {
      let me = this;
      this.$bvModal.show("addTextModal");
    },
    updateText(idObjecte) {
      let me = this;
      //pasem el idobjecte i el objecte a modificar
      axios
        .put("/textos/" + idObjecte, this.objectText)
        .then(function(response) {
          me.mensajeEdit();
          me.capturarTextos();

          me.$bvModal.hide("editTextModal");
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    storeText() {
      let me = this;
      //pasem el objecte a afegir
      console.log(this.objectText);

      axios
        .post("/textos/", me.objectText)
        .then(function(response) {
          me.capturarTextos();
          me.mensajeAdd();
          me.cancelar();
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    mensajeAdd() {
      alert("Text afegit amb exit");
    },
    mensajeEdit() {
      alert("Text modificat amb exit");
    },
    cancelar() {
      this.$bvModal.hide("editTextModal");
      this.$bvModal.hide("addTextModal");
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
