import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Detail from "../views/Detail.vue";
import AddPatient from "../views/AddPatient.vue";
import EditPatient from "../views/EditPatient.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: Home,
    },
    {
      path: "/detail/:id",
      name: "detail",
      component: Detail,
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      // component: () => import("../views/AboutView.vue"),
    },
    {
      path: "/add",
      name: "addPatient",
      component: AddPatient,
    },
    {
      path: "/edit/:id",
      name: "editPatient",
      component: EditPatient,
    },
  ],
});

export default router;
