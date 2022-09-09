import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import Home from './component/Home'
import Login from './component/Login'
import Register from './component/Register'


export const routes= [

    {
        path: '/home',
        component: Home
    },

    {
        path: '/login',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },
   
];
const router = createRouter({
    history: createWebHistory(),
    routes,
  });




  
  export default router;