import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import './axios'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@sweetalert2/theme-dark/dark.min.css';
import './assets/main.css'

const pinia = createPinia()

const app = createApp(App)

app.use(pinia)
app.use(router)

app.mount('#app')
