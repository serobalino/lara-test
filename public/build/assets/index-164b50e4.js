import{A as t}from"./app-f97b50b0.js";const o={empresas(){return t.get("/api/empresas")},departamentos(r){return t.get(`/api/departamentos/${r}`)},chat(r,a){const e={pregunta:r,tipo:a};return t.post("/chat",e)},cargos(r){return t.get(`/api/cargos/${r}`)},guardarRegistro(r){return t.post("/firma",r)}};export{o as s};
