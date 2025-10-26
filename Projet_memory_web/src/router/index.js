import { createRouter, createWebHistory } from "vue-router";
import Login from "../components/login.vue";
import Register from "../components/register.vue";
import Reception from "../components/reception-page.vue";

const routes = [
  { path: "/", name: "Login", component: Login },
  { path: "/register", name: "Register", component: Register },
  { path: "/Accueil", name: "home", component: Reception },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
