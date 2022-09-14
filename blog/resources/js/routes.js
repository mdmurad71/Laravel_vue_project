import { createWebHistory, createRouter } from "vue-router";
import * as VueRouter from "vue-router";

import Home from './component/Home'
import Login from './component/Login'
import Register from './component/Register'
import Logout from './component/Logout';
import Create from './Room/create';
import Edit from './Room/edit';
import index from './Room/index';
import Request from './Room/request';
import Confirm from './Room/confirmList';
import Demo from './Room/demo';



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

    {
        path: '/create',
        component: Create

    },

    {
        path: '/index',
        component: index,

    },

    {
        path: '/edit/:id',
        component: Edit,
        name: 'edit'

    },

    {
        path: '/request',
        component: Request,
        

    },

    {
        path: '/confirmList',
        component: Confirm,
        

    },

    {
        path: '/demo',
        component: Demo,
        

    },
   
   
];
const router = createRouter({
    history: createWebHistory(),
    routes,
  });




  
  export default router;