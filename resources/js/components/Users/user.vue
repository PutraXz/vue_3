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
                        <div class="col-md-3 col-sm-6 d-flex" v-for="(furniture, index) in paginated" :key="index">
                            <div class="card mb-4" style="width: 203px;height:216px" >
                                <div class="card-body">
                                    <img :src="furniture.image" alt="" class="card-img-top img-fluid">

                                    <p class="card-text" >{{ furniture.name }}</p>
                                </div>
                            </div>
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
<script>
    export default {
        data() {
            return {
                current: 1,
                pageSize: 10,
                furnitures: [
                    {name: 'test', image: '/image/Items/item_1.png'},
                    {name: 'nani', image: '/image/Items/item_2.png'},
                    {name: 'test', image: '/image/Items/item_3.png'},
                    {name: 'nani', image: '/image/Items/item_4.png'},
                    {name: 'test', image: '/image/Items/item_5.png'},
                    {name: 'nani', image: '/image/Items/item_6.png'},
                    {name: 'test', image: '/image/Items/item_7.png'},
                    {name: 'nani', image: '/image/Items/item_8.png'},
                    {name: 'test', image: '/image/Items/item_1.png'},
                    {name: 'nani', image: '/image/Items/item_2.png'},
                    {name: 'test', image: '/image/Items/item_3.png'},
                    {name: 'nani', image: '/image/Items/item_4.png'},
                    {name: 'test', image: '/image/Items/item_5.png'},
                    {name: 'nani', image: '/image/Items/item_6.png'},
                    {name: 'test', image: '/image/Items/item_7.png'},
                    {name: 'nani', image: '/image/Items/item_8.png'},
                    {name: 'test', image: '/image/Items/item_7.png'},
                    {name: 'nani', image: '/image/Items/item_8.png'},


                ],
            };
        },
        computed: {
            indexStart() {
            return (this.current - 1) * this.pageSize;
            },
            indexEnd() {
            return this.indexStart + this.pageSize;
            },
            paginated() {
            return this.furnitures.slice(this.indexStart, this.indexEnd);
            }
        },
        methods: {
            prev(){
                this.current--;
            },
            next(){
                this.current++;
            }
        },
    }

</script>
