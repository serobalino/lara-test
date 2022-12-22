import axios from 'axios';


export default {
    empresas() {
        return axios.get(`/api/empresas`);
    },
    departamentos(empresa){
        return axios.get(`/api/departamentos/${empresa}`);
    },
    cargos(departamento){
        return axios.get(`/api/cargos/${departamento}`);
    },
    guardarRegistro(formulario){
        return axios.post('/generar',formulario);
    }
};
