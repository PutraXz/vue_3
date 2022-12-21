import { createRouter, createWebHistory, useRoute } from 'vue-router';
import Hello from '../components/Hello.vue';
import PageLeft from '../components/PageLeft.vue';
import Navbar from '../components/Navbar.vue';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import User from '../components/Users/user.vue';
import Admin from '../components/Admin/admin.vue';
const routes = [{
        path: '/',
        name: 'Login',
        components: {
            default: Navbar,
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
        path: '/user',
        name: 'User',
        components: {
            Interface: User,
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
