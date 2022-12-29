import axios from 'axios';


export default {
    empresas() {
        return axios.get(`/api/empresas`);
    },
    departamentos(empresa){
        return axios.get(`/api/departamentos/${empresa}`);
    },
    chat(pregunta,isImg){
        const data = {
            pregunta: pregunta,
            tipo: isImg,
        }
        return axios.post(`/chat`,data);
    },
    cargos(departamento){
        return axios.get(`/api/cargos/${departamento}`);
    },
    guardarRegistro(formulario){
        return axios.post('/generar',formulario);
    },
    descargar(item){
        return axios({
            url: item.archive_download_url,
            method: 'GET',
            responseType: 'blob',
            headers: {'Authorization': `token ${item.sha4}`},
        })
    }
};
