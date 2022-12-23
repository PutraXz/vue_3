<template>
    <div>
        <div class="container">
            <div class="row">
            <form @submit="FormFurniture" enctype="multipart/form-data">
                <label for="">Title</label>
                <input type="text" v-model="formData.title">
                <label for="">Image Product</label>
                <input type="file" ref="file" v-on:change="onChange">
                <button class="btn btn-primary" >Upload</button>
            </form>

            </div>
        </div>
    </div>
</template>
<script>
   export default {
    data() {
        return {
            formData:{
                title: ''
            },
            file: '',
            fileName: '',
            success: '',
            output: ''
        };
    },
    methods: {
        FormFurniture(e) {
            e.preventDefault();
            console.log('submit ditekan');
            let formData = new FormData()
            formData.append('image', this.image)

            _.each(this.formData, (value, key) =>{
                formData.append(key, value)
            })
            const config = {
                headers : { 'content-type': 'multipart/form-data' }
            };
            axios.post('api/store', formData, config)
            .then(response =>{
                this.success = response.data.success;
            })
            .catch(err => {
                this.output = err;
            });
        },
        onChange(e){
            console.log(e.target.files[0])
            this.file = e.target.files[0]
            this.fileName = this.file.name

        },
    },
   };

</script>
