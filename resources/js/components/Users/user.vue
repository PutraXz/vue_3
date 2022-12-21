<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-2">
                <div class="category-items">
                    <div class="list-category mx-auto d-block">
                    
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-9">
                <div class="furniture-items">
                    <div class="row">
                        <div class="col-4">
                            <div class="card ms-3" style="width: 18rem;">
                                <div class="card-body">
                                    <p class="card-text" v-for="(furniture, i) in furnitures" :key="i">{{ furniture.name }}</p>
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
    .category-items{
        height: 20vh;
        width: 100%;
        background-color: aqua;
    }
    .list-category{
        height: 10vh;
        width: 80%;
        background-color: antiquewhite;
    }
    .furniture-items{
        height: 20vh;
        width: 100%;
        background-color: aqua;
    }

</style>
<script>
    export default {
        data() {
            return {
                furnitures: [
                    {name: 'test'},
                    {name: 'nani'}
                ]
            }
        }
    }

</script>