import Vue from 'vue'
import VueRouter from 'vue-router' 

Vue.use(VueRouter)

const routes = [{
    path: '/',
    name: 'Home',
    component: () => import('../views/Home.vue'),
    meta: {
      title: 'Home Page'
    }
  },
  {
    path: '/about',
    name: 'About',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import( /* webpackChunkName: "about" */ '../views/About.vue')
  },
  {
    path: '/auth',
    name: 'Auth',
    component: () => import('../views/Auth.vue'),
    meta: {
      title: 'User Authentication'
    }
  },
  {
    path: '/member',
    name: 'Member',
    component: () => import('../views/Member.vue'),
    meta: {
      title: 'Member Page'
    }
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('../views/Dashboard.vue'),
    meta: {
      title: 'Dashboard'
    },
    children: [
      { 
        path: '/dashboard/main',
        name: 'Main',
        component: () => import('../views/admin/Main.vue'),
        meta: {
          title: 'Halaman Utama'
        }
      },
      { 
        path: '/dashboard/reseller-list',
        name: 'ResellerList',
        component: () => import('../views/admin/Reseller.vue'),
        meta: {
          title: 'Daftar Reseller'
        }
      },
      {
        path: '/dashboard/add-reseller',
        name: 'ManageReseller',
        component: () => import('../views/admin/Manage.vue'),
        meta: {
          title: 'Kelola Data Reseller'
        }
      }

    ],
  },
  {
    path: '/daftar-member',
    nama: 'DaftarMember',
    component: () => import('../views/Region.vue'),
    meta: {
      title: 'Daftar Member'
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})
router.beforeEach((to, from, next) => {
  document.title = `${to.meta.title} - Kedas Beauty App`
  next()
})

export default router