<template>
   <div class="container-fluid p-0 m-0">
      <div class="row m-0">
         <router-view class="view one"></router-view>
         <router-view class="view one" name="PageLeft"></router-view>
         <router-view class="view two" name="Login"></router-view>
         <router-view class="view two" name="Register"></router-view>
         <router-view @loggedIn="setUser"></router-view>
        <span @click="logout">Logout</span>
      </div>
   </div>
</template>
<script>
   export default {
      data() {
         return {
            user: null,
            isLoggedIn: false
         }
      },
      mounted(){
         this.setUser()
      },
      methods: {
         setUser() {
            this.user = JSON.parse(localStorage.getItem('user'))
            this.isLoggedIn = localStorage.getItem('token') != null
         },
         logout(){
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            this.setUser

            this.$route.push('/')
         }
      }
   }

</script>