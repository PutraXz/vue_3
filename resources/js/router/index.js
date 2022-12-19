import {createRouter, createWebHistory, useRoute} from 'vue-router';
import Hello from '../components/Hello.vue';
import PageLeft from '../components/PageLeft.vue';
import Navbar from '../components/Navbar.vue';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import User from '../components/Users/user.vue';
const routes= [
    {
        path:'/',
        name:'Home',
        components:{
            default: Navbar,
            Login : Login,
            PageLeft : PageLeft
        }

    },
    {
        path:'/register',
        name:'Register',
        components:{
            default: Navbar,
            PageLeft: PageLeft,
            Register: Register
        }
    },
    {
        path:'/user',
        name:'user',
        component:User
    },
    {
        path:'/hello',
        name:'hello',
        component:Hello 
    }
];
const router = createRouter({
    history: createWebHistory(),
    routes
});
export default router;