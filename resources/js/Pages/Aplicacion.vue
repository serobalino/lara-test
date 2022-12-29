<template>
    <Head title="Commits"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Commits de APP</h2>
        </template>
        <div class="container mx-auto py-10">
            <div class="p-6 shadow-lg rounded-lg bg-white text-gray-700">
                <h2 class="font-semibold text-3xl mb-5">{{ app.nombre_app }}</h2>
            </div>
            <div class="mt-5 columns-2">
                <div class="p-2" v-for="item in commits">
                    <div class="flex flex-row rounded-lg bg-white shadow-lg"
                         :class="{'bg-green-100':item.estado_co==='succeeded'||item.estado_co==='success','bg-red-100':item.estado_co==='failed' || item.estado_co==='failure'}">
                        <img class="w-full cover rounded-t-lg md:rounded-none md:rounded-l-lg"
                             v-if="item.github.committer" :src="item.github.committer.avatar_url"/>
                        <div class="p-6 flex flex-col justify-start">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">{{ item.github.commit.author.name }}</h5>
                            <p class="text-gray-700 text-base mb-4">{{ item.github.commit.message }}</p>
                            <p class="text-gray-600 text-xs">{{ item.created_at }}</p>

                            <button
                                class="w-full inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                v-on:click="verDev(item)">
                                Ver deploy
                            </button>
                            <hr class="py-1">
                            <a class="w-full inline-block text-center px-4 py-1.5 bg-violet-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-violet-700 hover:shadow-lg focus:bg-violet-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-violet-800 active:shadow-lg transition duration-150 ease-in-out"
                               v-if="!item.github.message"
                               :href="item.github.html_url"
                               target="_blank"
                            >
                                Ver en GitHub
                            </a>
                            <div class="" v-if="item.artefactos.total_count">
                                <p class="m-0 row border-bottom border-primary mt-2">COMPILACIONES</p>
                                <div class="flex items-center justify-center">
                                    <div class="inline-flex">
                                        <div v-for="item2 in item.artefactos.artifacts" :key="item2.id" class="col">
                                            <button
                                                class="rounded-l px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                                                type="button"
                                                v-on:click="descargar(item2)"
                                                :disabled="load[item2.id]"
                                            >
                                                <i class="fas fa-circle-notch fa-spin" v-if="load[item2.id]"></i>
                                                {{ item2.name }} ({{ item2.size_in_mbytes }}mb)
                                            </button>
                                            <br>
                                            <small>Expira {{ item2.expires_at }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';
import Services from "@/Services";

export default {
    name: "Aplicacion",
    components: {
        Head,
        AuthenticatedLayout
    },
    props: ['app', 'commits'],
    data: () => ({
        load: {}
    }),
    methods: {
        verDev(item) {
            if (item.ghaction_co) {
                window.open(item.log_co, '_blank').focus();
            } else {
                console.log("No soporta este registro")
            }
        },
        descargar: function (item) {
            this.load[item.id] = true;
            Services.descargar(item).then((response) => {
                const url = window.URL.createObjectURL(new Blob([response.data]));
                const link = document.createElement('a');
                link.href = url;
                link.setAttribute('download', `${item.name}.zip`); //or any other extension
                document.body.appendChild(link);
                link.click();
                this.load[item.id] = false;
            }).catch(() => {
                this.load[item.id] = false;
            })
        }
    }
}
</script>
