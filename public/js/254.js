"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[254],{4198:(e,n,t)=>{t.d(n,{Z:()=>r});var i=t(3645),a=t.n(i)()((function(e){return e[1]}));a.push([e.id,".heading[data-v-df1d33ae]{font-size:5rem}@media screen and (max-width:992px){.heading[data-v-df1d33ae]{font-size:2.6rem}}@media screen and (max-width:576px){img#banner-image[data-v-df1d33ae]{height:200px}}",""]);const r=a},6922:(e,n,t)=>{t.d(n,{Z:()=>r});var i=t(3645),a=t.n(i)()((function(e){return e[1]}));a.push([e.id,".price-singleton[data-v-1b94a968]{align-items:center;border-bottom:2px dotted #3b4146;display:flex;flex-flow:row nowrap;justify-content:space-between;white-space:nowrap;width:100%}",""]);const r=a},2164:(e,n,t)=>{t.d(n,{Z:()=>r});var i=t(3645),a=t.n(i)()((function(e){return e[1]}));a.push([e.id,"#pricelist-container[data-v-62f99356]{background-color:#1d2223}.d-grid[data-v-62f99356]{display:grid;gap:0 30px;grid-template-columns:1fr 1fr}@media screen and (max-width:992px){.d-grid[data-v-62f99356]{grid-template-columns:1fr}}",""]);const r=a},3300:(e,n,t)=>{t.d(n,{Z:()=>u});var i=t(821),a={class:"position-relative"},r=["src","alt"],s={class:"position-absolute top-50 start-50 translate-middle w-100 text-center"};const c={name:"PageBanner",props:{title:{required:!0},image:{required:!0},black:{default:!1}}};var d=t(3379),o=t.n(d),l=t(4198),p={insert:"head",singleton:!1};o()(l.Z,p);l.Z.locals;const u=(0,t(3744).Z)(c,[["render",function(e,n,t,c,d,o){return(0,i.wg)(),(0,i.iD)("div",a,[(0,i._)("img",{id:"banner-image",class:"img-fluid",src:t.image,alt:t.title},null,8,r),(0,i._)("div",s,[(0,i._)("h1",{class:(0,i.C_)(["heading underlined",{"text-black":t.black}])},(0,i.zw)(t.title),3)])])}],["__scopeId","data-v-df1d33ae"]])},254:(e,n,t)=>{t.r(n),t.d(n,{default:()=>H});var i=t(821),a=function(e){return(0,i.dD)("data-v-62f99356"),e=e(),(0,i.Cn)(),e},r={id:"services"},s={class:"section-wrapper my-5",id:"pricelist"},c={class:"container-xxl"},d={id:"pricelist-container",class:"px-4 py-5"},o=a((function(){return(0,i._)("h1",{class:"text-center mb-5"},"Ценоразпис",-1)})),l={key:0},p=[a((function(){return(0,i._)("h2",{class:"text-center"}," Зареждане ...",-1)}))],u={key:1,class:"d-grid"},g={key:2},v=[a((function(){return(0,i._)("h2",{class:"text-center"},"Няма добавени услуги",-1)}))];var f={class:"price-singleton py-4"},m={class:"me-3"},h={class:"text_secondary fw-bold"};const w={name:"PriceSingleton",props:["title","price"],setup:function(){}};var x=t(3379),_=t.n(x),b=t(6922),Z={insert:"head",singleton:!1};_()(b.Z,Z);b.Z.locals;var k=t(3744);const y=(0,k.Z)(w,[["render",function(e,n,t,a,r,s){return(0,i.wg)(),(0,i.iD)("div",f,[(0,i._)("span",m,(0,i.zw)(t.title),1),(0,i._)("span",h,(0,i.zw)(t.price)+" BGN ",1)])}],["__scopeId","data-v-1b94a968"]]);var D=t(2653),P=t(3300),z=t(9669),C=t.n(z);const S={name:"Services",components:{PriceSingleton:y,SectionDivider:D.Z,PageBanner:P.Z},setup:function(){var e=(0,i.iH)([]),n=(0,i.iH)(!1);return(0,i.bv)((function(){n.value=!0,C().get("api/services").then((function(t){if(n.value=!1,200===t.status)return e.value=t.data})).catch((function(e){return n.value=!1,console.log("Could not fetch services",e)}))})),{isLoading:n,prices:e}}};var B=t(2164),j={insert:"head",singleton:!1};_()(B.Z,j);B.Z.locals;const H=(0,k.Z)(S,[["render",function(e,n,t,a,f,m){var h=(0,i.up)("PageBanner"),w=(0,i.up)("PriceSingleton");return(0,i.wg)(),(0,i.iD)("div",r,[(0,i.Wm)(h,{title:"Всички услуги",image:"https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-31-dark-copyright.jpg"}),(0,i._)("div",s,[(0,i._)("div",c,[(0,i._)("div",d,[o,a.isLoading?((0,i.wg)(),(0,i.iD)("div",l,p)):a.prices.length>0?((0,i.wg)(),(0,i.iD)("div",u,[((0,i.wg)(!0),(0,i.iD)(i.HY,null,(0,i.Ko)(a.prices,(function(e){return(0,i.wg)(),(0,i.j4)(w,{key:e.id,title:e.name,price:e.price},null,8,["title","price"])})),128))])):((0,i.wg)(),(0,i.iD)("div",g,v))])])])])}],["__scopeId","data-v-62f99356"]])}}]);