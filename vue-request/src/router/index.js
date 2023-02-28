import { createRouter, createWebHistory } from 'vue-router'

const isUserLoggedIn = false;

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        {
          path: '',
          component: () => import('../views/HomeView.vue'),
          name: 'home',
        }
      ]
    },
    {
      path: '/',
      name: 'create',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        {
          path: 'create',
          component: () => import('../views/CreateView.vue'),
          meta: {
            needsAuth: true,
          }
        }
      ],
    },
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        { path: 'progress', component: () => import('../views/ProgressView.vue') }
      ]
    },
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        { path: 'me/requests', component: () => import('../views/me/RequestsView.vue') }
      ]
    },
    {
      path: '/',
      component: () => import('../views/layouts/MainLayout.vue'),
      children: [
        { path: 'me/profile', component: () => import('../views/me/ProfileView.vue') }
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

router.beforeEach((to, from, next) => {
  if (to.meta.needsAuth) {
    if (isUserLoggedIn) {
      next();
    } else {
      next('/login')
    }
  } else {
    next();
  }
})

export default router
