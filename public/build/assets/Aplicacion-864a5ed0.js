import{_ as x}from"./AuthenticatedLayout-fa1dd7c2.js";import{H as v,r as h,o as s,c as a,a as b,w as g,F as i,b as e,t as c,d as f,n as y,e as d,f as w}from"./app-4096caa5.js";import{s as k}from"./index-917a4418.js";import{_ as C}from"./ApplicationLogo-e9ac03b6.js";const A={name:"Aplicacion",components:{Head:v,AuthenticatedLayout:x},props:["app","commits"],data:()=>({load:{}}),methods:{verDev(o){o.ghaction_co?window.open(o.log_co,"_blank").focus():console.log("No soporta este registro")},descargar:function(o){this.load[o.id]=!0,k.descargar(o).then(u=>{const r=window.URL.createObjectURL(new Blob([u.data])),l=document.createElement("a");l.href=r,l.setAttribute("download",`${o.name}.zip`),document.body.appendChild(l),l.click(),this.load[o.id]=!1}).catch(()=>{this.load[o.id]=!1})}}},L=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"},"Commits de APP",-1),N={class:"container mx-auto py-10"},V={class:"p-6 shadow-lg rounded-lg bg-white text-gray-700"},H={class:"font-semibold text-3xl mb-5"},B={class:"mt-5 columns-2"},E={class:"p-2"},$=["src"],j={class:"p-6 flex flex-col justify-start"},z={class:"text-gray-900 text-xl font-medium mb-2"},D={class:"text-gray-700 text-base mb-4"},O={class:"text-gray-600 text-xs"},P=["onClick"],F=e("hr",{class:"py-1"},null,-1),I=["href"],R={key:1,class:""},S=e("p",{class:"m-0 row border-bottom border-primary mt-2"},"COMPILACIONES",-1),U={class:"flex items-center justify-center"},G={class:"inline-flex"},M=["onClick","disabled"],T={key:0,class:"fas fa-circle-notch fa-spin"},q=e("br",null,null,-1);function J(o,u,r,l,K,_){const m=h("Head"),p=h("AuthenticatedLayout");return s(),a(i,null,[b(m,{title:"Commits"}),b(p,null,{header:g(()=>[L]),default:g(()=>[e("div",N,[e("div",V,[e("h2",H,c(r.app.nombre_app),1)]),e("div",B,[(s(!0),a(i,null,f(r.commits,t=>(s(),a("div",E,[e("div",{class:y(["flex flex-row rounded-lg bg-white shadow-lg",{"bg-green-100":t.estado_co==="succeeded"||t.estado_co==="success","bg-red-100":t.estado_co==="failed"||t.estado_co==="failure"}])},[t.github.committer?(s(),a("img",{key:0,class:"w-full cover rounded-t-lg md:rounded-none md:rounded-l-lg",src:t.github.committer.avatar_url},null,8,$)):d("",!0),e("div",j,[e("h5",z,c(t.github.commit.author.name),1),e("p",D,c(t.github.commit.message),1),e("p",O,c(t.created_at),1),e("button",{class:"w-full inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out",onClick:n=>_.verDev(t)}," Ver deploy ",8,P),F,t.github.message?d("",!0):(s(),a("a",{key:0,class:"w-full inline-block text-center px-4 py-1.5 bg-violet-600 text-white font-medium text-xs leading-normal uppercase rounded shadow-md hover:bg-violet-700 hover:shadow-lg focus:bg-violet-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-violet-800 active:shadow-lg transition duration-150 ease-in-out",href:t.github.html_url,target:"_blank"}," Ver en GitHub ",8,I)),t.artefactos.total_count?(s(),a("div",R,[S,e("div",U,[e("div",G,[(s(!0),a(i,null,f(t.artefactos.artifacts,n=>(s(),a("div",{key:n.id,class:"col"},[e("button",{class:"rounded-l px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium text-xs leading-tight uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out",type:"button",onClick:Q=>_.descargar(n),disabled:o.load[n.id]},[o.load[n.id]?(s(),a("i",T)):d("",!0),w(" "+c(n.name)+" ("+c(n.size_in_mbytes)+"mb) ",1)],8,M),q,e("small",null,"Expira "+c(n.expires_at),1)]))),128))])])])):d("",!0)])],2)]))),256))])])]),_:1})],64)}const ee=C(A,[["render",J]]);export{ee as default};
