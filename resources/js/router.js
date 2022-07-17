import Homepage from "./pages/homepage/Homepage";
import {createRouter, createWebHistory} from "vue-router";

const routes = [
    {path: "/", component: Homepage, name: "home"},
    {
        path: "/services",
        name: "services",
        component: () => import("./pages/pricelist/Pricelist"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
