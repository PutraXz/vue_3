<template>
    <div>
        <form @submit="FormFurniture" enctype="multipart/form-data">
                <div class="mt-5 row">
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-3">
                        <input type="text" v-model="formData.title" class="form-control">
                    </div>
                </div>
                <div class="mt-4 row">
                    <label for="" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-3">
                        <input type="text" v-model="formData.price" class="form-control">
                    </div>
                </div>
                <div class="mt-4 row">
                    <label for="" class="col-sm-2 col-form-label">Image Product</label>
                    <div class="col-sm-3">
                        <input type="file" ref="file" v-on:change="onChange">
                    </div>
                </div>
                <div class="mt-4 row">
                    <label for="" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-3">
                        <Multiselect v-model="value" :options="options"/>
                    </div>
                </div>
                <div class="mt-4 row">
                    <label for="" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" v-model="formData.description"></textarea>
                    </div>
                </div>
                <button class="btn btn-primary" >Upload</button>
            </form>
       
    </div>
</template>
<script>
// import Select2 from 'vue3-select2-component';
    import Multiselect from '@vueform/multiselect'
   export default {
    props:["class"],
    components: { Multiselect },
    data() {
        return {
            value: null,
            options: ['Living Room','Bed Room','Kitchen', 'Bathroom'],
            formData:{
                title: '',
                price: '',
                description: '',
                category: '',
            },
            file: '',
            fileName: '',
            success: '',
            output: ''
        };
    },
    watch:{
        value : function(value){
           let item =  this.formData.category = value
            console.log(item);
        }
    },
    methods: {
        onChange(e){
            let test = e.target.files[0]
            console.log(test)
            this.file = e.target.files[0]
            this.fileName = this.file.name

        },
        FormFurniture(e) {
            e.preventDefault();
            console.log('submit ditekan');
            let formData = new FormData()
            formData.append('file', this.file)

            _.each(this.formData, (value, key) =>{
                formData.append(key, value)
            })
            const config = {
                headers : { 'content-type': 'multipart/form-data' }
            };
            axios.post('api/store', formData, config)
            .then(response =>{
                this.$router.push({name: 'Login'})
                this.success = response.data;
                console.log(this.success)
            })
            .catch(err => {
                this.output = console.log(err);
            });
        },

    },
   };

</script>
<style src="@vueform/multiselect/themes/default.css"></style>
