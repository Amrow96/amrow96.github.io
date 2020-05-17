<template>
    <main>
        <div class="container ">
            <!-- Isotip + intntro -->
            <div class="row">
                <img
                    src="resources/img/Isotipo.svg"
                    onerror="this.onerror=null; this.src='image.png'"
                />
                <h1>
                    Esto es el componente con el texto:
                    {{ textos }}
                </h1>
                <button class="btn" @click="capturarTextParticular()">
                    BTN Change
                </button>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    data() {
        return {
            textos: null,
            idioma: [" txtcast, txtcat, txteng "],
            paraula: "1",
            consulta: "nompau"
        };
    },
    created() {
        this.capturarTextos();
    },
    mounted() {
        console.log("Component mounted.");
    },
    methods: {
        capturarTextos() {
            let me = this;

            axios
                .get("/textos/" + me.paraula)
                .then(function(response) {
                    me.textos = response.data.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        },
        obtenirTextParticular(item) {}
    }
};
</script>
