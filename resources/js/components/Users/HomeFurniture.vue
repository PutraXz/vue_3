<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3 col-2">
                <div class="category-items">
                    <div class="list-category mx-auto d-block">
                    <ul>
                        <li v-for="category in categorys">
                            <input type="checkbox" v-model="checkedCategorys" v-on:click="filterJobs" v-bind:value="category" />  {{category}}
                        </li> 
                    </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-9">
                <div class="furniture-items">
                    <div class="row p-0 m-0">
                        <div class="col-md-3 col-sm-6 d-flex" v-for="item in filteredJobs">
                            <div class="card mb-4" style="width: 203px;height:216px" >
                                <div class="card-body">
                                    <img :src="'/image/Items/' + item.file" alt="" class="card-img-top img-fluid">
                                    <router-link class="stretched-link router" @click="itemDetail(item.slug)" :to="{name: 'Detail', params: {slug: item.slug} }" >{{ item.title }}</router-link>
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
    .router {
        color: black;
        text-decoration: none;
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
                laravelData: {},
                detail: {},
                items: [],
                categorys: ['Living Room','Bed Room','Kitchen', 'Bathroom'],
                jobs: null,
                checkedCategorys: []
            };
        },
        computed: {
            filteredJobs(){
                if (!this.checkedCategorys.length)
                return this.items

                return this.items.filter(j => this.checkedCategorys.includes(j.category))
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
            async getResults(page=1){
                await axios.get(`/api/show?page=${page}`).then(({data})=>{
                    this.items = data.Items.data
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
        filters: {
            capitalize: function (value) {
            if (!value) return '';
            value = value.toString();
            return value.charAt(0).toUpperCase() + value.slice(1);
            }
        }
    }
</script>
