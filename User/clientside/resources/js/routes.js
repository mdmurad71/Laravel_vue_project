// import copmHeader from './Components/info'
// import copmFooter from './Components/about'
// import products from './components/products.vue'
import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import home from './component/home'
import login from './component/login'
import Reserve from './component/Reserve'


export const routes= [

    {
        path: '/',
        component: home
    },
    {
        path: '/login',
        component: login
    },

    {
        path: '/reserve/:id',
        component: Reserve,
        name: 'reserve'
    },

  
];
const router = createRouter({
    history: createWebHistory(),
    routes,
  });
//   const router = VueRouter.createRouter({
//     history: VueRouter.createWebHashHistory(),
//     routes, 
//   })



  
  export default router;
