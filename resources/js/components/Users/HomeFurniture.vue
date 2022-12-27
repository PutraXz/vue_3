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
                                    <p>{{ post.id }}</p>
                                    <router-link class="stretched-link" @click="itemDetail(post.slug)" :to="{name: 'Detail', params: {slug: post.slug} }">Detail</router-link>
                                    <!-- <button class="stretched-link" @click="itemDetail(post.id)" ></button> -->
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <Bootstrap5Pagination class="" :data="laravelData"  @pagination-change-page="getResults" style="float:left;position: relative;left:40%"/>
                        </div>
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
        props: ['laravelData'],

        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                laravelData: {},
                detail: {},
            };
        },
        mounted() {
            this.getResults();
        },
        methods: {
            async getResults(page=1){
                await axios.get(`/api/show?page=${page}`).then(({data})=>{
                    this.laravelData = data.Items
                }).catch(({ response })=>{
                    console.error(response)
                })
            },
            itemDetail(slug){
                axios.get(`/api/show/${slug}`)
                .then(response =>{
                    this.detail = response.data
                })
            }
        },

    }
</script>
