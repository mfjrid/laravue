import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'

import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@sweetalert2/theme-dark/dark.min.css';
import './assets/main.css'

const app = createApp(App)

app.use(router)

app.mount('#app')
