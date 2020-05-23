<template>
    <main>
        <div class="row">
            <div class="col col-12 text-center">
                <div class="vh-100 d-flex justify-content-center">
                    <div class="col mt-auto mb-auto">
                        <div class="row">
                            <div class="col">
                                <h1 class="titulo">
                                    {{ textosMostrar[0].text }}
                                </h1>
                                <h2 class="subtitulo">
                                    {{ textosMostrar[1].text }}
                                </h2>
                            </div>
                        </div>
                        <div class="text-center row mt-3">
                            <li v-for="item in projectes" :key="item.titol">
                                <a class="democolor" :href="item.link">{{
                                    item.titol
                                }}</a>
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
                { referencia: "musica", numero: "17" },
                { referencia: "musicadesc", numero: "18" }
            ],
            textosCat: [],
            textosCast: [],
            textosEng: [],
            textosMostrar: [],

            projectes: [
                {
                    titol: "Si em paguessin per sortir de festa",
                    link: "https://www.youtube.com/watch?v=mb-lFVcJTVM",
                    text:
                        "Amb el meu grup vam fer aquest treball del cual estem molt contents"
                },
                {
                    titol: "LP-T'ho Pinto",
                    link: "youtube.com/kliu",
                    text: "Amb el meu grup vam fer aquest disc amb 12 cançons"
                },
                {
                    titol: "Si em paguessin per sortir de festa",
                    link: "youtube.com/kliu",
                    text:
                        "Amb el meu grup vam fer aquest treball del cual estem molt contents"
                },
                {
                    titol: "LP-T'ho Pinto",
                    link: "youtube.com/kliu",
                    text: "Amb el meu grup vam fer aquest disc amb 12 cançons"
                },
                {
                    titol: "Si em paguessin per sortir de festa",
                    link: "youtube.com/kliu",
                    text:
                        "Amb el meu grup vam fer aquest treball del cual estem molt contents"
                },
                {
                    titol: "LP-T'ho Pinto",
                    link: "youtube.com/kliu",
                    text: "Amb el meu grup vam fer aquest disc amb 12 cançons"
                }
            ]
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
