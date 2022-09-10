import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import Home from './component/Home'
import Login from './component/Login'
import Register from './component/Register'
import Logout from './component/Logout'


export const routes= [

    {
        path: '/home',
        component: Home
    },

    {
        path: '/',
        component: Login
    },
    {
        path: '/register',
        component: Register
    },

    {
        path: '/logout',
        component: Logout
    },
   
   
];
const router = createRouter({
    history: createWebHistory(),
    routes,
  });




  
  export default router;