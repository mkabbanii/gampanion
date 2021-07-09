import Vue from "vue";
import Router from "vue-router";

// Containers
const TheContainer = () => import("../Layouts/TheContainer.vue");

//Pages
const Payment = () => import("../Pages/Payment.vue");

Vue.use(Router);

let router = new Router({
    mode: "history", // https://router.vuejs.org/api/#mode
    linkActiveClass: "active",
    scrollBehavior: () => ({ y: 0 }),
    routes: configRoutes()
});

// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         // this route requires auth, check if logged in
//         // if not, redirect to login page.
//         if (localStorage.getItem("api_token") == null) {
//             next({
//                 path: "/",
//             });
//         } else {
//             next();
//         }
//     } else {
//         next(); // make sure to always call next()!
//     }
// });

export default router;

function configRoutes() {
    return [
        {
            path: "/",
            component: TheContainer,
            children: [
                {
                    path: "/payment",
                    name: "Payment",
                    component: Payment
                }
            ]
        }
    ];
}
