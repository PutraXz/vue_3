<template>
    <div class="container">
      <div class="row">
        <div class="col">
  
          <div v-for="cat in categoryList">
            <input type="checkbox" :id="cat" :value="cat" v-model="categories">
            <label :for="cat">{{cat}}</label>
          </div>

   
        </div>
        <div class="col">
          <strong>Items in chosen category(s)</strong>
  
          <ul>
            <li v-for="item in selectedItems"> category: {{item.category}}</li>
          </ul>
        </div>
      </div>
    </div>
  </template>
  
  <script>
    export default {
      name: 'Checkbox',
      data() {
        return {
          categoryList: ['Living Room','Batman','Kitchen', 'Bathroom'],
          categories: [],
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
      mounted(){
        this.getResult();
      },
      methods: {
         getResult(){
           axios.get('api/show')
             .then(res =>{
                 this.items = res.data.Items.data
                 console.log(res.data.Items.data);
             })
         },
      }
    };
  </script>
