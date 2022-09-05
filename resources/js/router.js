import Homepage from "./pages/homepage/Homepage";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {path: "/", component: Homepage, name: "home"},
    {
        path: "/services",
        name: "services",
        component: () => import("./pages/services/Services"),
    },
    {
        path: "/about",
        name: "about",
        component: () => import("./pages/about/About"),
    },
    {
        path: "/product/:id",
        name: "product.page",
        props: true,
        component: () => import("./pages/product/Product"),
    },
    {
        path: "/cart",
        name: "cart.page",
        component: () => import("./pages/cart/CartPage"),
    },
    {
        path: "/shop",
        name: "shop.page",
        component: () => import("./pages/shop/ShopPage"),
    },
    {
        path: "/appointments",
        name: "appointments.page",
        component: () => import("./pages/appointments/AppointmentsPage"),
    },
    {
        path: "/gallery",
        name: "gallery.page",
        component: () => import("./pages/gallery/GalleryPage"),
    },
    {
        path: "/thanks",
        name: "thanks.page",
        component: () => import("./pages/thanks/OrderThanksPage"),
    }
];

const router = createRouter({
    mode: 'history',
    history: createWebHistory(),
    routes,
});

export default router;
