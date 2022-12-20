<template>
   <nav class="navbar navbar-expand-lg bg-light shadow">
     <div class="container-fluid">
       <img src="image/nav.png" alt="" class="image-nav" />
       <div class="collapse navbar-collapse">
         <h1 class="text-start nav-text m-0">Furniturpedia</h1>
         <ul v-if="requiresAuth">
           <li @click="logout" style="cursor: pointer">Logout</li>
         </ul>
       </div>
     </div>
   </nav>
   <div class="container-fluid p-0 m-0">
     <div class="row m-0">
       <router-view class="view one"></router-view>
       <router-view class="view two" name="PageLeft"></router-view>
       <router-view class="view three" name="Login"></router-view>
       <router-view class="view four" name="Register"></router-view>
     </div>
   </div>
 </template>
 <style>
 .image-nav {
   width: 5rem;
 }
 .nav-text {
   font-size: 22px;
   color: #97404c;
 }
 </style>
 <script>
 export default {
   data() {
     return {
       user: null,
       requiresAuth: false, 
     };
   },
   mounted() {
     this.setUser();
   },
   watch: {
     "$route.params": {
       handler(val) {
         if (val && val.requiresAuth) this.setUser();
       },
       deep: true,
     },
   },
   methods: {
     setUser() {
       this.user = JSON.parse(localStorage.getItem("user"));
       let token = localStorage.getItem("token") != null;
       if (token) {
         this.requiresAuth = !this.requiresAuth;
       }
     },
     logout() {
       localStorage.removeItem("token");
       localStorage.removeItem("user");
       this.setUser;
       this.requiresAuth = false;
       this.$router.push({ name: "Login" });
     },
   },
 };
 </script>
 
 
 