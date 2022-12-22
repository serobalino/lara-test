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
                        <Form @submit="validar" :validation-schema="schema" v-slot="{ errors }">
                            <fieldset :disabled="cargando">
                                <label class="block">
                                    <span>*</span>Nombre
                                    <Field type="text" v-model="formulario.nombre" name="nombre" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="Carlos"/>
                                    <small class="text-red-600">{{errors.nombre}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Apellido
                                    <Field type="text" v-model="formulario.apellido" name="apellido" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="Rosales"/>
                                    <small class="text-red-600">{{errors.apellido}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Celular
                                    <Field type="tel" v-model="formulario.celular" name="celular" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="0998978458" />
                                    <small class="text-red-600">{{errors.celular}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Correo Electónico
                                    <Field type="email" v-model="formulario.email" name="email" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="crosales@google.com"/>
                                    <small class="text-red-600">{{errors.email}}</small>
                                </label>
                                <label class="block">
                                    Extensión telefónica
                                    <Field type="tel" v-model="formulario['extención']" name="extensión" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="1020" />
                                    <small class="text-red-600">{{errors['extención']}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Empresa
                                    <Field class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" as="select" v-model="empresa" name="empresa">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item.id_em" v-for="item in empresas" :key="item.id_em">{{item.nombre_em}}</option>
                                    </Field>
                                    <small class="text-red-600">{{errors.empresa}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Área
                                    <Field class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" as="select" v-model="departamento" name="área">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item.id_de" v-for="item in departamentos" :key="item.id_de">{{item.titulo_de}}</option>
                                    </Field>
                                    <small class="text-red-600">{{errors['área']}}</small>
                                </label>
                                <label class="block">
                                    <span>*</span>Cargo
                                    <Field class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" as="select" v-model="formulario.cargo" name="cargo">
                                        <option :value="null" disabled>Selecciona</option>
                                        <option :value="item.id_ca" v-for="item in cargos" :key="item.id_ca">{{item.nombre_ca}}</option>
                                    </Field>
                                    <small class="text-red-600">{{errors.cargo}}</small>
                                </label>
                                <label class="block">
                                    Skype(usuario)
                                    <Field type="text" v-model="formulario.skype" name="skype" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="carlos.rosales"  />
                                    <small class="text-red-600">{{errors.skype}}</small>
                                </label>
                                <label class="block">
                                    Github (link)
                                    <Field type="url" v-model="formulario.github" name="github" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="https://github.com/crosales"  />
                                    <small class="text-red-600">{{errors.github}}</small>
                                </label>
                                <label class="block">
                                    LinkedIn (link)
                                    <Field type="url" v-model="formulario.linkedin" name="linkedin" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0" placeholder="https://ec.linkedin.com/in/ricardo-rosales-18317123" />
                                    <small class="text-red-600">{{errors.linkedin}}</small>
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
                nombre: yup.string().required(),
                apellido: yup.string().required(),
                celular: yup.string().trim().matches(/^[0][8-9][0-9]{7}[0-9]/,'Ingresa un número de celular válido').max(10).required(),
                'extención': yup.string().max(5),
                email: yup.string().required().email(),
                empresa: yup.number().required(),
                'área': yup.number().required(),
                cargo: yup.number().required(),
                skype: yup.string().matches(/^[a-z][a-z0-9\.,\-_]{5,31}$/,'Ingresa un usuario de Skype válido'),
                github: yup.string().matches(/^(http(s?):\/\/)?(www\.)?github\.([a-z])+\/([A-Za-z0-9]{1,})+\/?$/i,'Ingresa el link de tu cuenta de github válida'),
                linkedin: yup.string().matches(/^(http(s?):\/\/)?(www\.)?linkedin\.com(?:\/[^\/]+)/,'Ingresa el link de tu cuenta de LinkedIn'),
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
                this.departamento = null
                this.cargarDepartamentos();
            },
            departamento:function(val){
                if(val){
                    this.cargarCargos()
                }
            }
        },
        methods:{
            cargarEmpresas:function(){
                this.empresa = null
                this.departamento = null
                this.cargo = null
                servicios.empresas().then(response=>{
                    this.empresas=response.data;
                });
            },
            cargarDepartamentos:function(){
                this.departamento = null
                this.cargo = null
                servicios.departamentos(this.empresa).then(response=>{
                    this.departamentos=response.data;
                });
            },
            cargarCargos:function(){
                this.cargo = null
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
