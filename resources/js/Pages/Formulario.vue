<template>
    <div class="container mx-auto mt-10 w-3/4">
        <div class="jumbotron">
            <div class="">
                <h1 class="text-2xl">Generador de Firmas</h1>
                <p class="lead">Completa el formulario</p>
                <hr class="my-4">
                <p>Los campos con asterisco son obligatorios</p>
            </div>
            <div class="flex justify-center">
                <div class="shadow-lg m-5 p-5 rounded-lg sm:w-full w-20">
                    <div class="">
                        <form @submit.prevent="validar" class="">
                            <fieldset :disabled="cargando">
                                <label class="block">
                                    <span>*</span>Nombre
                                    <input type="text" v-model="formulario.nombre" name="nombre" class="form-input mt-1 block w-full" placeholder="Carlos"/>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Apellido
                                    <input type="text" v-model="formulario.apellido" name="apellido" class="form-input mt-1 block w-full" placeholder="Rosales"/>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Celular
                                    <input type="tel" v-model="formulario.celular" name="celular" class="form-input mt-1 block w-full" placeholder="0998978458" />
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Correo Electónico
                                    <input type="email" v-model="formulario.email" name="email" class="form-input mt-1 block w-full" placeholder="crosales@google.com"/>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    Extensión telefónica
                                    <input type="tel" v-model="formulario['extención']" name="extensión" class="form-input mt-1 block w-full" placeholder="1020" />
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Empresa
                                    <select class="form-select mt-1 block w-full" v-model="empresa" name="empresa">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item" v-for="item in empresas" :key="item.id_em">{{item.nombre_em}}</option>
                                    </select>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Área
                                    <select class="form-select mt-1 block w-full" v-model="departamento" name="área">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item" v-for="item in departamentos" :key="item.id_de">{{item.titulo_de}}</option>
                                    </select>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    <span>*</span>Cargo
                                    <select class="form-select mt-1 block w-full" v-model="formulario.cargo" name="cargo">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item.id_ca" v-for="item in cargos" :key="item.id_ca">{{item.nombre_ca}}</option>
                                    </select>
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    Skype(usuario)
                                    <input type="text" v-model="formulario.skype" name="skype" class="form-input mt-1 block w-full" placeholder="carlos.rosales"  />
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    Github (link)
                                    <input type="url" v-model="formulario.github" name="github" class="form-input mt-1 block w-full" placeholder="https://github.com/crosales"  />
                                    <small class="text-red-600"></small>
                                </label>
                                <label class="block">
                                    LinkedIn (link)
                                    <input type="url" v-model="formulario.linkedin" name="linkedin" class="form-input mt-1 block w-full" placeholder="https://ec.linkedin.com/in/ricardo-rosales-18317123" />
                                    <small class="text-red-600"></small>
                                </label>
                                <div class="mt-6">
                                    <button :disabled="cargando" type="submit" class="px-4 py-2 font-semibold text-sm bg-blue-500 text-white rounded-md shadow-sm hover:scale-125 ease-in-out duration-300 delay-150">Generar</button>
                                </div>
                                <pre class="text-red-600" v-if="cargando">{{texto}}</pre>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import servicios from "../Services";
    import { Form, Field } from "vee-validate";
    import * as yup from "yup";
    export default {
        name: "formulario",
        components: {
            Form,
            Field,
        },
        setup() {
            const schema = yup.object().shape({
                email: yup.string().required().email(),
                password: yup.string().required().min(8),
            });
            return {
                schema,
            };
        },
        data:()=>({
            empresas:[],
            departamentos:[],
            cargos:[],

            empresa:null,
            departamento:null,
            cargo:null,
            formulario:{
                nombre:null,
                apellido:null,
                celular:null,
                'extención':null,
                email:null,
                skype:null,
                linkedin:null,
                github:null,
                cargo:null,
            },
            cargando:false,
            texto:'Procesando',
        }),
        watch:{
            empresa:function(){
                this.cargarDepartamentos();
            },
            departamento:function(){
                this.cargarCargos()
            }
        },
        methods:{
            cargarEmpresas:function(){
                servicios.empresas().then(response=>{
                    this.empresas=response.data;
                });
            },
            cargarDepartamentos:function(){
                servicios.departamentos(this.empresa).then(response=>{
                    this.departamentos=response.data;
                });
            },
            cargarCargos:function(){
                servicios.cargos(this.departamento).then(response=>{
                    this.cargos=response.data;
                });
            },
            validar:function(){
                this.cargando=true;
                this.texto = "Procesando"
                servicios.guardarRegistro(this.formulario).then(response=>{
                    this.cargando=false;
                    window.location.href = response.data.data;
                }).catch((e)=>{
                    this.texto = e.response.data.message
                    setTimeout(()=>{
                        this.cargando=false;
                    },5000)
                })
            }
        },
        mounted() {
            this.cargarEmpresas();
        }
    }
</script>

<style scoped>
    .block>span{
        content: "*";
        color: red;
    }
</style>
