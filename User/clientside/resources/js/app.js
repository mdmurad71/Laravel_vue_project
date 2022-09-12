require('./bootstrap');

import { createApp } from 'vue';
// import App from './App.vue'
import router from './routes';







const app = createApp({})

app.use(router)

app.mount('#app')