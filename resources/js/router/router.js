import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => getPage("Home"),
    },
    {
        path: "/test",
        component: () => getPage("Test"),
    },
    {
        path:"/admin",
        component:()=>getAdminPage("Dashboard"),
    }
];

const getPage = (fileName) => import (`@/pages/${fileName}.vue`);
const getAdminPage = (fileName) => import (`@/pages/admin/${fileName}.vue`);

export default createRouter({
    history: createWebHistory(),
    routes,
});