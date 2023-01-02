<template>
    <div class="mt-5 ms-5 d-flex justify-content-arround">
        <div class="card mt-5 ms-5 " style="width: 450px;height:500px">
            <div class="card-body mt-5 ">
                <img v-bind:src="'/image/Items/' + furniture.file" class="card-img-top img-fluid mx-auto d-block" style="width: 90%;height:88%" /> 
            </div>
        </div>
        <div class="furniture-title mt-5 ms-5">
            <h3 class="ms-5 mt-4">{{ furniture.title }}</h3>
        </div>
    </div>
</template>
<style>
    
</style>
<script>
   export default {
    props:{
        slug: {
            type: String,
            required: true
        },
    },
    data() {
        return {
            // detail: {
            //     slug: '',
            // },
            furniture: {},
        };
    },
    created: function (){
        this.getSlug();
    },
    methods: {
        getSlug(){
             axios.get('/api/show/' + this.slug)
             .then(response =>{
                this.furniture = response.data.content
             }).catch(err => {
                console.error(err);
             });
        }
    },
   }

</script>