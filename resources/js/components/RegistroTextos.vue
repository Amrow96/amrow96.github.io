<template>
    <main class="container">
        <div class="col-12 democolor">Demo</div>
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
                        <b-button
                            class="mr-1 col-12"
                            @click="editText(row.item)"
                            >{{ textos.editar[idioma] }}</b-button
                        >
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
                >
                    {{ textos.afegirIncidencia[idioma] }}
                </button>
            </div>
            <!-- Modal Edit  -->
            <b-modal
                id="editTextModal"
                :title="textos.editarIncidencia[idioma]"
                @ok="saveIncident(objectText.id)"
                @hidden="cancelar()"
            >
                <form action method="put">
                    <div class="row">
                        <!-- Referencia -->
                        <div class="col-12">
                            {{ textos.numeroIncidencia[idioma] }}:
                            <input
                                v-model.number="objectText.num_incidencia"
                                class="form-control"
                                name="num_incidencia"
                                type="text"
                                :placeholder="textos.numeroIncidencia[idioma]"
                            />
                        </div>
                        <!-- Català -->
                        <div class="col-12">
                            {{ textos.telefon[idioma] }}:
                            <input
                                v-model.number="objectText.telefon_alertant"
                                class="form-control"
                                type="text"
                                name="telefon_alertant"
                                :placeholder="textos.telefon[idioma]"
                            />
                        </div>
                        <!-- Castellà -->
                        <div class="col-12">
                            {{ textos.adreca[idioma] }}:
                            <input
                                v-model="objectText.adreca"
                                class="form-control"
                                type="text"
                                name="adreca"
                                :placeholder="textos.adreca[idioma]"
                            />
                        </div>
                        <!-- Anglés -->
                        <div class="col-12">
                            {{ textos.adreca[idioma] }}:
                            <input
                                v-model="objectText.adreca"
                                class="form-control"
                                type="text"
                                name="adreca"
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
                        >{{ textos.cancelar[idioma] }}</b-button
                    >
                    <!-- Button with custom close trigger value -->
                    <b-button
                        size="sm"
                        variant="primary"
                        @click="saveIncident(objectText.id)"
                        >{{ textos.guardar[idioma] }}</b-button
                    >
                </template>
            </b-modal>
            <!-- Modal Add -->
            <b-modal
                id="addTextModal"
                :title="textos.editarIncidencia[idioma]"
                @ok="saveIncident(objectText.id)"
                @hidden="cancelar()"
            >
                <form action method="put">
                    <div class="row">
                        <!-- Referencia -->
                        <h1>Estas afegint</h1>
                        <div class="col-12">
                            {{ textos.numeroIncidencia[idioma] }}:
                            <input
                                v-model.number="objectText.num_incidencia"
                                class="form-control"
                                name="num_incidencia"
                                type="text"
                                :placeholder="textos.numeroIncidencia[idioma]"
                            />
                        </div>
                        <!-- Català -->
                        <div class="col-12">
                            {{ textos.telefon[idioma] }}:
                            <input
                                v-model.number="objectText.telefon_alertant"
                                class="form-control"
                                type="text"
                                name="telefon_alertant"
                                :placeholder="textos.telefon[idioma]"
                            />
                        </div>
                        <!-- Castellà -->
                        <div class="col-12">
                            {{ textos.adreca[idioma] }}:
                            <input
                                v-model="objectText.adreca"
                                class="form-control"
                                type="text"
                                name="adreca"
                                :placeholder="textos.adreca[idioma]"
                            />
                        </div>
                        <!-- Anglés -->
                        <div class="col-12">
                            {{ textos.adreca[idioma] }}:
                            <input
                                v-model="objectText.adreca"
                                class="form-control"
                                type="text"
                                name="adreca"
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
                        >{{ textos.cancelar[idioma] }}</b-button
                    >
                    <!-- Button with custom close trigger value -->
                    <b-button
                        size="sm"
                        variant="primary"
                        @click="saveIncident(objectText.id)"
                        >{{ textos.guardar[idioma] }}</b-button
                    >
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
                id: null,
                txtref: "",
                txtcat: null,
                txtcast: null,
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
        nuevo() {
            window.location.href = "/project_broggi/public/registroIncidencias"; //cridar al altre modal
        },
        editText(item) {
            let me = this;
            me.objectText = item;
            this.$bvModal.show("editTextModal");
        },
        newText(item) {
            let me = this;
            me.objectText = item;
            this.$bvModal.show("addTextModal");
        },
        saveIncident(idObjecte) {
            let me = this;
            axios
                .put("/incidencies/" + idObjecte, this.objectText)
                .then(function(response) {
                    me.obtenerIncidencias();
                    me.$bvModal.hide("editTextModal");
                })
                .catch(function(error) {
                    me.missatge = error.response.data;
                    me.mensajesError.push(me.missatge.error);
                });
        },
        cancelar() {
            this.obtenerIncidencias();
            this.$bvModal.hide("editTextModal");
        }
    }
};
</script>

<style lang="scss" scoped>
section {
    padding-top: 20px;
    padding-bottom: 20px;
    height: 100vh;
}
.modal-content {
    width: 100% !important;
    position: absolute !important;
    top: 200px !important;
}
.mostrar {
    display: list-item !important;
    opacity: 1 !important;
    position: absolute !important;
    background-color: #00000077 !important;
}
form div {
    margin-bottom: 2rem;
}
</style>
