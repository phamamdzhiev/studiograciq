"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[820],{4198:(e,t,n)=>{n.d(t,{Z:()=>r});var a=n(3645),i=n.n(a)()((function(e){return e[1]}));i.push([e.id,".heading[data-v-df1d33ae]{font-size:5rem}@media screen and (max-width:992px){.heading[data-v-df1d33ae]{font-size:2.6rem}}@media screen and (max-width:576px){img#banner-image[data-v-df1d33ae]{height:200px}}",""]);const r=i},2866:(e,t,n)=>{n.d(t,{Z:()=>r});var a=n(3645),i=n.n(a)()((function(e){return e[1]}));i.push([e.id,"@media screen and (max-width:991px){ul#shop_categories[data-v-47f00b96]{display:grid;gap:5px;grid-template-columns:1fr;width:100%}ul#shop_categories button[data-v-47f00b96],ul#shop_categories li[data-v-47f00b96]{white-space:nowrap;width:100%}}",""]);const r=i},7631:(e,t,n)=>{n.d(t,{Z:()=>r});var a=n(3645),i=n.n(a)()((function(e){return e[1]}));i.push([e.id,".heading[data-v-608612a3]{color:#000!important}.shop[data-v-608612a3]{display:grid;gap:15px;grid-template-columns:repeat(5,1fr)}@media screen and (max-width:991px){.shop[data-v-608612a3]{grid-template-columns:repeat(2,1fr)}}@media screen and (max-width:576px){.shop[data-v-608612a3]{grid-template-columns:repeat(1,1fr)}}",""]);const r=i},3300:(e,t,n)=>{n.d(t,{Z:()=>p});var a=n(821),i={class:"position-relative"},r=["src","alt"],s={class:"position-absolute top-50 start-50 translate-middle w-100 text-center"};const o={name:"PageBanner",props:{title:{required:!0},image:{required:!0},black:{default:!1}}};var d=n(3379),l=n.n(d),c=n(4198),u={insert:"head",singleton:!1};l()(c.Z,u);c.Z.locals;const p=(0,n(3744).Z)(o,[["render",function(e,t,n,o,d,l){return(0,a.wg)(),(0,a.iD)("div",i,[(0,a._)("img",{id:"banner-image",class:"img-fluid",src:n.image,alt:n.title},null,8,r),(0,a._)("div",s,[(0,a._)("h1",{class:(0,a.C_)(["heading underlined",{"text-black":n.black}])},(0,a.zw)(n.title),3)])])}],["__scopeId","data-v-df1d33ae"]])},4820:(e,t,n)=>{n.r(t),n.d(t,{default:()=>I});var a=n(821),i=function(e){return(0,a.dD)("data-v-608612a3"),e=e(),(0,a.Cn)(),e},r={class:"section-wrapper my-5"},s={class:"container-xxl"},o=i((function(){return(0,a._)("h1",{class:"my-5 d-flex align-items-center"},[(0,a._)("i",{class:"bi bi-bag-heart-fill fs-1 me-3"}),(0,a.Uk)("Продукти ")],-1)})),d={key:0,class:"shop"},l={key:1,class:"my-5"},c=[i((function(){return(0,a._)("h2",{class:"text-center"},"Няма намерени продукти в тази категория :(",-1)}))];var u=n(3347),p=(0,a.Uk)(" Категории "),g={key:0,id:"shop_categories"},m=["onClick"];var h=n(9669),f=n.n(h);const v={name:"CategoriesHeader",setup:function(e,t){var n=t.emit,i=(0,a.iH)([]),r=(0,a.iH)(!1);return(0,a.bv)((function(){f().get("/api/products/categories").then((function(e){200===e.status&&(i.value=e.data)}))})),{handleClickEvent:function(e){n("changeUri",e)},productsCategories:i,shown:r}}};var b=n(3379),w=n.n(b),_=n(2866),k={insert:"head",singleton:!1};w()(_.Z,k);_.Z.locals;var x=n(3744);const C=(0,x.Z)(v,[["render",function(e,t,n,i,r,s){return(0,a.wg)(),(0,a.iD)("div",null,[(0,a._)("div",{class:"d-flex align-items-center mb-4 fw-bold text_tertiary",role:"button",onClick:t[0]||(t[0]=function(e){return i.shown=!i.shown})},[p,(0,a._)("i",{class:(0,a.C_)([i.shown?"bi-arrow-up-short":"bi-arrow-down-short","bi ps-1 text_tertiary"])},null,2)]),i.productsCategories.length>0?(0,a.wy)(((0,a.wg)(),(0,a.iD)("ul",g,[(0,a._)("li",null,[(0,a._)("button",{class:"d-block mb-3 btn_tertiary",onClick:t[1]||(t[1]=function(e){return i.handleClickEvent(null)})}," Всички ")]),((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(i.productsCategories,(function(e){return(0,a.wg)(),(0,a.iD)("li",{key:e.id},[(0,a._)("button",{class:"d-block mb-3 btn_tertiary text-capitalize",onClick:function(t){return i.handleClickEvent(e.id)}},(0,a.zw)(e.name),9,m)])})),128))],512)),[[a.F8,i.shown]]):(0,a.kq)("",!0)])}],["__scopeId","data-v-47f00b96"]]);var y=n(3300);const Z={name:"ShopPage",components:{ProductItemSingleton:u.Z,PageBanner:y.Z,CategoriesHeader:C},setup:function(){var e=(0,a.iH)([]),t=(0,a.iH)("/api/products/all");function n(){f().get(t.value).then((function(t){200===t.status&&(e.value=t.data)})).catch((function(e){return console.log("Could not fetch products",e)}))}return(0,a.bv)((function(){n()})),{shopItems:e,emitHandler:function(e){t.value=null==e?"/api/products/all":"/api/products/all?category=".concat(e),n()}}}};var H=n(7631),D={insert:"head",singleton:!1};w()(H.Z,D);H.Z.locals;const I=(0,x.Z)(Z,[["render",function(e,t,n,i,u,p){var g=(0,a.up)("PageBanner"),m=(0,a.up)("CategoriesHeader"),h=(0,a.up)("ProductItemSingleton");return(0,a.wg)(),(0,a.iD)(a.HY,null,[(0,a.Wm)(g,{title:"Магазин",image:"/storage/assets/banners/banner-shop.png"}),(0,a._)("div",r,[(0,a._)("div",s,[o,(0,a.Wm)(m,{onChangeUri:i.emitHandler},null,8,["onChangeUri"]),i.shopItems.length>0?((0,a.wg)(),(0,a.iD)("div",d,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(i.shopItems,(function(e){return(0,a.wg)(),(0,a.iD)("div",{key:e.id},[(0,a.Wm)(h,{id:e.id,image:e.image_big,name:e.name,brand:e.brand,price:e.price},null,8,["id","image","name","brand","price"])])})),128))])):((0,a.wg)(),(0,a.iD)("div",l,c))])])],64)}],["__scopeId","data-v-608612a3"]])}}]);