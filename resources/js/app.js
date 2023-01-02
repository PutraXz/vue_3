/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import router from './router/index';
import App from './App.vue'
import Two from './components/Two.vue';
const two = createApp(Two);
two.use(router).mount('#two');
const app = createApp(App);

app.use(router);
app.mount('#app');

// const app = createApp({});

//
// app.component('example-component', ExampleComponent);
// app.mount('#app');