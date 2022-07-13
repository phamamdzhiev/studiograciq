import Homepage from "./pages/homepage/Homepage";
import { createRouter, createWebHistory } from "vue-router";

const routes = [{ path: "/", component: Homepage }];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
