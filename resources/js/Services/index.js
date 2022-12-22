import axios from 'axios';


export default {
    empresas() {
        return axios.get(`/api/empresas`);
    },
    departamentos(empresa){
        return axios.get(`/api/departamentos/${empresa.id_em}`);
    },
    cargos(departamento){
        return axios.get(`/api/cargos/${departamento.id_de}`);
    },
    guardarRegistro(formulario){
        return axios.post('/generar',formulario);
    }
};
