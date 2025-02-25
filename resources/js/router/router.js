import { createRouter, createWebHistory } from "vue-router";
import { homeRoutes } from "@/router/home-routes";
import { adminRoutes } from "@/router/admin-routes";

const routes = [
    ...homeRoutes,
    ...adminRoutes
];


export default createRouter({
    history: createWebHistory(),
    routes,
});