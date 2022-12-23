<template>
    <div>
        <p v-for="item in items">{{  item.title }}</p>
    </div>

</template>

<script>
   export default {
    data() {
        return{
            items: [],
            result: ''
        }
    },
    mounted(){
        axios.get('api/show')
        .then(response => {
             let item = this.items = response.data.Items.data 
        })
    }
   }

</script>