<template>
    <div class="col-4 col-md-2 offset-md-1">
        <div class="login-rightbar">
            <img src="image/Saly.png" alt="" class="mx-auto d-block">
            <h3 class="text-center p-5 text-login">Login</h3>
            <div class="input-group input-group mb-3">
                <div v-if="error" class="alert bg-danger text-white ">
                    {{ error }}
                </div>
                <form @submit.prevent="FormLogin">
                    <input type="email" v-model="email" id="email" class="form-control mb-3 rounded-pill" placeholder="Masukkan Email Anda">
                    <input type="password" v-model="password" id="password" class="form-control mb-3 rounded-pill" placeholder="Password">
                    <button class="btn btn-outline-secondary form-control rounded-pill" type="submit" >Button</button>
                </form>
            </div>              
        </div>
    </div>
</template>
<style>
    .text-login{
        font-size: 40px;
    }
</style>
<script>
    export default{
        data() {
            return {
                email: '',
                password: '',
                error: null,
                message: ''
            }
        },
        created() {
            if (this.$route.params.message !== undefined){
                this.message = this.$route.params.message + 'Please Login'
            }
        },
        methods: {
            FormLogin() {
                axios.post('api/login', {
                    email: this.email,
                    password: this.password
                }).then(response => {
                    // localStorage.setItem('user', Json.stringify(response.data.content))
                    localStorage.setItem('token', response.data.token)
                    
                    let loginType = response.data.content.level
                    console.log(loginType);
                    if (loginType === 'user'){
                        this.$router.push({ name: 'user' })
                    }else if (loginType === 'admin'){
                        this.$router.push({ name: 'user' })
                    }else {
                        this.$route.push('home')
                    } 

                    
                    // this.$emit('loggedIn')
                })
                .catch(error => {
                    this.error = error.response?.data?.error;
                });
            }
        },
    }
</script>
 