<template>
    <div class="col-4 col-md-2 offset-md-1">
        <div class="register-rightbar">
            <img src="image/Saly.png" alt="" class="mx-auto d-block">
            <h3 class="text-center p-5 text-register">Register</h3>
            <div v-if="errors" class="alert bg-danger text-white ">
                <div v-for="(v, k) in errors" :key="k">
                <p v-for="error in v" :key="error" class="text-sm">
                    {{ error }}
                </p>
                </div>
            </div>
            <div class="input-group input-group mb-3 mx-auto d-block">
                <form @submit.prevent="FormRegister">
                    <input type="email" class="form-control mb-3 rounded-pill" placeholder="Email" v-model="user.email" required>
                    <input type="text" class="form-control mb-3 rounded-pill" placeholder="Username" v-model="user.name" required>
                    <input type="password" class="form-control mb-3 rounded-pill" placeholder="Password" v-model="user.password" required>
                    <input type="password" class="form-control mb-3 rounded-pill" placeholder="Confirm Password" v-model="user.repassword" required>
                    <button class="btn btn-outline-secondary form-control rounded-pill" type="submit" id="button-addon1">Register</button>
                </form>
            </div>               
        </div>
    </div>
</template>
<style>
    .text-register{
        font-size: 40px;
    }
    .btn {
        background-color: #E42C14;
        color: #fff;
        border-color: transparent;
    }
</style>
<script>
    export default {
        data(){
            return {
                user:
                 {
                    email: '',
                    name: '',
                    password: '',
                    repasword: ''
                 },
                 errors: null,
            }
        },
        methods: {
            FormRegister(){
                axios.post('api/register', this.user)
                .then(response => {
                    this.$router.push({
                        name: 'Login',
                        params: {
                            message: response.data.message
                        }
                    })
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
            }
        }
    }

</script>
 