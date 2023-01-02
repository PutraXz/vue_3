<template>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-3 col-2">
                <div class="category-items">
                    <div class="list-category mx-auto d-block">
                        <div v-for="cat in categoryList">
                            <input type="checkbox" :id="cat" :value="cat" v-model="categories">
                            <label :for="cat">{{cat}}</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-9">
                <div class="furniture-items">
                    <div class="row p-0 m-0">
                        <div class="col-md-3 col-sm-6 d-flex" v-for="item in selectedItems">
                        <p>{{ item.category }}</p>
                            <!-- <div class="card mb-4" style="width: 203px;height:216px" >
                                <div class="card-body">
                                    <img v-bind:src="'/image/Items/' + item.file" class="card-img-top img-fluid"/> 
                                    <p class="card-text" >{{ item.title  }}</p>
                                    <p>{{ item.id }}</p>
                                    <router-link class="stretched-link" @click="itemDetail(item.slug)" :to="{name: 'Detail', params: {slug: item.slug} }">Detail</router-link>
                        
                                </div>
                            </div> -->
                        </div>
                        <div class="">
                            <Bootstrap5Pagination class="" :data="items"  @pagination-change-page="getResults" style="float:left;position: relative;left:40%"/>
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
        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                categoryList: ['Living Room','Batman','Kitchen', 'Bathroom'],
                categories: [],
                laravelData: {},
                detail: {},
                items: [],
            };
        },
        computed: {
            selectedItems: function () {
                let cats = this.categories;
                return this.items.filter(function (item) {
                    return -1 !== _.indexOf(cats, item.category);
                });
            },
        },
        mounted() {
            this.getResults();
        },
        
        methods: {
            async getResults(page=1){
                await axios.get(`/api/show?page=${page}`).then(({data})=>{
                    this.items = data.Items.data
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
