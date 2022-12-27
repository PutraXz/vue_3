<template>
    <div class="mt-5">
        <div class="card mt-5 ms-5" style="width: 714px;height:500px">
            <div class="card-body mt-5">
                <p></p>
                <HomeFurniture :laravelData="furniture" />
            </div>
        
        </div>
    </div>
</template>
<style>
    
</style>
<script>
import HomeFurniture from '../Users/HomeFurniture.vue';
   export default {
    components: HomeFurniture,
    data() {
        return {
            detail: {
                slug: '',
            },
            furniture: {},
        }
    },
    methods: {
        function(){
             axios.get('api/show/'+this.$route.params.slug)
             .then(response =>{
                console.log(response)
             }).catch(err => {
                console.error(err);
             });
        }
    },
   }

</script>