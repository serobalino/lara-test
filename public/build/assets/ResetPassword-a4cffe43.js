import{s as c,o as f,m as w,w as d,a as o,u as e,H as _,b as t,f as V,n as b,x as g}from"./app-4096caa5.js";import{_ as k}from"./GuestLayout-dc14c972.js";import{_ as l,a as m,b as i}from"./TextInput-c2d23d23.js";import{_ as v}from"./PrimaryButton-7921fbd7.js";import"./ApplicationLogo-e9ac03b6.js";const x=["onSubmit"],y={class:"mt-4"},P={class:"mt-4"},$={class:"flex items-center justify-end mt-4"},U={__name:"ResetPassword",props:{email:String,token:String},setup(u){const n=u,s=c({token:n.token,email:n.email,password:"",password_confirmation:""}),p=()=>{s.post(route("password.store"),{onFinish:()=>s.reset("password","password_confirmation")})};return(S,a)=>(f(),w(k,null,{default:d(()=>[o(e(_),{title:"Reset Password"}),t("form",{onSubmit:g(p,["prevent"])},[t("div",null,[o(l,{for:"email",value:"Email"}),o(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(s).email,"onUpdate:modelValue":a[0]||(a[0]=r=>e(s).email=r),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(i,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),t("div",y,[o(l,{for:"password",value:"Password"}),o(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:e(s).password,"onUpdate:modelValue":a[1]||(a[1]=r=>e(s).password=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),t("div",P,[o(l,{for:"password_confirmation",value:"Confirm Password"}),o(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:e(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=r=>e(s).password_confirmation=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),t("div",$,[o(v,{class:b({"opacity-25":e(s).processing}),disabled:e(s).processing},{default:d(()=>[V(" Reset Password ")]),_:1},8,["class","disabled"])])],40,x)]),_:1}))}};export{U as default};
