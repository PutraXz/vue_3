<template>
    <div>
        <div class="card-body">
            <ul>
                <li v-for="tag in data" :key="tag.id">{{ tag.title }}</li>
            </ul>
            <pagination :data="laravelData" @pagination-change-page="getResults"></pagination>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

   export default {
        components:{
            'pagination': window['laravel-vue-pagination']
        },
    data() {
        return{
            laravelData:{},
            data: '',
        }
    },
    mounted(){
        console.log('Component mounted.')

    },
     created() {
            this.getResults();
        },
    methods: {
        getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('api/show?page=' + page)
                    .then(response => {
                        this.laravelData = response
                        this.laravelData = this.data
                    });
        },
    },
   }
</script>
