import { createRouter, createWebHistory, useRoute } from 'vue-router';
import PageLeft from '../components/PageLeft.vue';
import Navbar from '../components/Navbar.vue';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import HomeFurniture from '../components/Users/HomeFurniture.vue';
import Admin from '../components/Admin/admin.vue';
import Detail from '../components/Users/Detail.vue';
const routes = [{
        path: '/',
        name: 'Login',
        components: {
            Login: Login,
            PageLeft: PageLeft
        }
    },
    {
        path: '/register',
        name: 'Register',
        components: {
            default: Navbar,
            PageLeft: PageLeft,
            Register: Register
        }
    },
    {
        path: '/detail/:slug',
        name: 'Detail',
        component: Detail,
        meta: {
            requiresAuth: true,
            isUser: true
        }
    },
    {
        path: '/user',
        name: 'User',
        components: {
            Interface: HomeFurniture,
        },
        meta: {
            requiresAuth: true,
            isUser: true
        }
    },
    {
        path: '/admin',
        name: 'Admin',
        component: Admin,
        meta: {
            requiresAuth: true,
            isAdmin: true
        }
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
});
// router.beforeEach((to) => {
//         console.log(to)
//     })
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {

        let token = localStorage.getItem('token') != null;
        if (!token) {
            next({
                path: '/',
                query: {
                    redirect: to.fullPath
                }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('user'))
            let level = user.level
            if (to.matched.some(record => record.meta.isUser)) {
                if (level.includes('user')) next()
                else if (level === 'admin') {
                    next({
                        name: 'Admin'
                    })
                } else next({
                    name: 'Login'
                })
            } else if (to.matched.some(record => record.meta.isAdmin)) {
                if (level.includes('admin')) next()
                else if (level === 'user') {
                    next({
                        name: 'User'
                    })
                } else next({
                    name: 'Login'
                })
            } else {
                next()
            }
        }
    } else {
        next()
    }
})
export default router;