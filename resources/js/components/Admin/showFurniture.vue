<template>
    <div>
        <span>search field:</span>
        <select v-model="searchField">
            <option>category</option>
        </select>
        <br/>
        <span>search value: </span>
        <input type="text" v-model="searchValue">
    <Vue3EasyDataTable
            buttons-pagination
            show-index
            :headers="headers"
            :items="items"
            :search-field="searchField"
            :search-value="searchValue"
        > 
        
        <template #item-action="item">
            <div class="operation-wrapper" v-for="item in items">
                <img
                src="/image/delete.png"
                class="operation-icon"
                @click="deleteItem(item.slug)"
                />
                <img
                src="/image/edit.png"
                class="operation-icon"
                @click="editItem(item.slug); showModal = true"
                />
            </div>
        </template>
    </Vue3EasyDataTable>
        <div class="modal-mask" v-if="showModal" @close="showModal = false">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" @submit.prevent="updateItem(edit.slug)">
                            <div class="mt-5 row">
                                <label for="" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-3">
                                    <input type="text" v-model="edit.title" class="form-control">
                                </div>
                            </div>
                            <div class="mt-5 row">
                                <label for="" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-3">
                                    <input type="text" v-model="edit.price" class="form-control">
                                </div>
                            </div>
                            <div class="mt-5 row">
                                <label for="" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-3">
                                    <input type="text" v-model="edit.description" class="form-control">
                                </div>
                            </div>
                            <div class="mt-5 row">
                                <label for="" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-3">
                                    <Multiselect v-model="edit.category" :options="options"/>
                                </div>
                            </div>
                            <div class="mt-5 row">
                                <label for="" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-3">
                                    <img :src="'/image/Items/' + edit.file" alt="" class="card-img-top img-fluid" id='edit-category-image'>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button class="modal-default-button" @click="showModal = false">Close</button>
                            <button class="modal-default-button mx-2" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.operation-wrapper .operation-icon {
  width: 20px;
  cursor: pointer;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 120vh;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter-from, .modal-leave-to {
  opacity: 0;
}

.modal-enter-active .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

</style>
<script>
import Multiselect from '@vueform/multiselect'
import Vue3EasyDataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
    export default {
        components :{
            Vue3EasyDataTable,
             Multiselect ,
        },
        data() {
            return {
                value: null,
                options: ['Living Room','Bed Room','Kitchen', 'Bathroom'],
                items: [],
                searchField: 'category',
                searchValue: '',
                headers: [
                    { text: "Title", value: "title" },
                    { text: "Price", value: "price"},
                    { text: "Description", value: "description"},
                    { text: "Category", value: "category"},
                    { text: "Action", value: "action"},
                ],
                showModal: false,
                yourData: [],
                edit: {
                    id: '',
                    title: '',
                    price: '',
                    description: '',
                    category: '',
                    file: '',
                    slug: '',
                }
            }
        },
        computed(){

        },
        watch:{
            value : function(value){
                let item =  this.edit.category = value
                console.log(item);
            }
        },
        mounted(){
            this.getResult();
        },
        methods: {

            onChangeEdit(e){
                this.edit.file = e.target.files[0];
                $('#edit-category-image').attr('src', URL.createObjectURL(e.target.files[0]));
                console.log(e.target.files[0]);
            },
            async deleteItem(slug){
              const deleteItems = axios.delete(`/api/dataFurniture/delete/${slug}`)
              if(deleteItems.status === 200){
                const getData = await getData();
                this.yourData = getData.data;

              }
                // .then(res => {
                //     location.reload()
                //     console.log(res);
                // }).catch(err =>{
                //     console.error(err);
                // })
            },
            updateItem(slug){
                console.log('tekan');
                let formData = new FormData();
                formData.append('title', this.edit.title);
                formData.append('price', this.edit.price);   
                formData.append('description', this.edit.description);   
                formData.append('category', this.edit.category);
                const config = {
                    headers : { 'content-type': 'multipart/form-data' }
                };
                axios.post(`/api/dataFurniture/store/${slug}`, formData, config)
                .then(res =>{
                    console.log(res);
                }).catch(err => {
                    console.error(err);
                })
            },
            editItem(slug){
                axios.get(`/api/dataFurniture/edit/${slug}`)
                .then(res => {
                    this.edit.id = res.data.content.id;
                    this.edit.title = res.data.content.title;
                    this.edit.price = res.data.content.price;
                    this.edit.description = res.data.content.description;
                    this.edit.category = res.data.content.category;
                    this.edit.file = res.data.content.file;
                    this.edit.slug = res.data.content.slug;
                }).catch(err => {
                    console.error(err);
                })
            },
            getResult(){
                axios.get('/api/dataFurniture')
                .then(res =>{
                    this.items = res.data.Items
                    // console.log(this.items);
                }).catch(err =>{
                    console.error(err);
                });
            },
        },
    }

</script>