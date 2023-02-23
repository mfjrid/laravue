import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        { path: '', component: () => import('../views/HomeView.vue') }
      ]
    },
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        { path: 'create', component: () => import('../views/CreateView.vue') }
      ]
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue')
    },
  ]
})

export default router
