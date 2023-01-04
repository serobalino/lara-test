<template>
    <Head title="Chat IA" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Chat IA</h2>
        </template>
        <div class="py-12">
            <div class="container mx-auto w-3/4">
                <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen bg-white shadow-lg rounded-lg">
                    <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
                        <template  v-for="(item,index) in preguntas" :key="index">
                            <div class="chat-message" >
                                <div class="flex items-end">
                                    <template v-if="item.tipo">
                                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                                            <img :src="images.url" alt="" v-for="(images,inImg) in item.data" :key="inImg+'-imgs'+index"/>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start" v-for="texto in item.choices" :key="texto.index+1+'res'+index">
                                            <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{ texto.text }}</span></div>
                                        </div>
                                    </template>
                                    <div class="w-6 h-6 rounded-full order-1 bg-red-600 text-center">
                                        <small class="text-white">IA</small>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-message" v-if="item.pregunta">
                                <div class="flex items-end justify-end">
                                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                                        <div><span class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white ">{{ item.pregunta }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
                        <div class="relative flex">
                            <span class="absolute inset-y-0 flex items-center">
                                <button :disabled="procesando" type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 ml-1 transition duration-500 ease-in-out text-gray-500 focus:outline-none" :class="{'bg-gray-300':!isImg,'bg-blue-500':isImg }" @click="isImg=!isImg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </button>
                            </span>
                            <input :disabled="procesando" type="text" v-model="pregunta" :placeholder="isImg ? 'Describe que quieres dibujar' : 'Escribe un mensaje'" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 pl-12 placeholder-gray-600 bg-gray-200 rounded-md py-3">
                            <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                                <button type="button" class="inline-flex items-center justify-center rounded-lg px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none" @click="preguntar" :disabled="procesando || !pregunta">
                                    <span class="font-bold">{{ procesando ? 'Procesando' : 'Enviar' }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 ml-2 transform rotate-90">
                                        <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <pre>{{ error }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Services from "@/Services";
export default {
    name: "Chat",
    data: ()=>({
        pregunta: '',
        isImg: false,
        procesando: false,
        preguntas: [],
        error: null
    }),
    props: ['auth'],
    components: {
        Head,
        AuthenticatedLayout
    },
    methods: {
        preguntar() {
            this.procesando = true;
            this.error = null
            Services.chat(this.pregunta,this.isImg).then((response)=>{
                this.preguntas.push({...response.data.data,...{pregunta:this.pregunta, tipo: this.isImg}})
                this.procesando = false;
                this.pregunta = '';
            }).catch((e)=>{
                this.error = e.response.data
                this.procesando = false;
            })
        },
        scroll() {
            const el = document.getElementById('messages')
            el.scrollTop = el.scrollHeight
        },
        saludo() {
            const name = this.auth.user.name
            this.preguntas.push({
                tipo: false,
                choices: [
                    {
                        text: `Hola ${name}, en que te puedo ayudar?`
                    }
                ]
            })
        }
    },
    mounted() {
        this.saludo()
        this.scroll()
    }
}
</script>

<style scoped>
.scrollbar-w-2::-webkit-scrollbar {
    width: 0.25rem;
    height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
    --bg-opacity: 1;
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
    --bg-opacity: 1;
    background-color: #edf2f7;
    background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
    border-radius: 0.25rem;
}

</style>
