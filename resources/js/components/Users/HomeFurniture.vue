<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3 col-2">
                <div class="category-items">
                    <div class="list-category mx-auto d-block">

                    </div>
                </div>
            </div>
            <div class="col-md-9 col-9">
                <div class="furniture-items">
                    <div class="row p-0 m-0">
                        <div class="col-md-3 col-sm-6 d-flex" v-for="post in laravelData.data" :key="post.id">
                            <div class="card mb-4" style="width: 203px;height:216px" >
                                <div class="card-body">
                                    <img v-bind:src="'/image/Items/' + post.file" class="card-img-top img-fluid"/> 
                                    <p class="card-text" >{{ post.title  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <Bootstrap5Pagination class="ms-5 m-0" :data="laravelData" :align="center" @pagination-change-page="getResults" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
    body{
        background-color: #DDDDDD;
    }
    .list-category{
        height: 58.5rem;
        width: 80%;
        background-color: #fff;
    }
    .card{
        border-radius: 20px;
    }


</style>

<script >
import { Bootstrap5Pagination  } from 'laravel-vue-pagination';
    export default{
        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                laravelData: {}
            };
        },
        mounted() {
            this.getResults();
        },
        methods: {
            async getResults(page=1){
                await axios.get(`/api/show?page=${page}`).then(({data})=>{
                    this.laravelData = data.Items
                    console.log(data.Items.data[0]);
                }).catch(({ response })=>{
                    console.error(response)
                })
            }
        },

    }
</script>
