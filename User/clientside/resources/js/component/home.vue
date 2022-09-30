<template lang="">
    <div clas="container">
        <nav class="navbar navbar-light bg-dark justify-content-center">
            <router-link to="/list" class="btn btn-outline-success text-white text-center" style="text-allign:center">Reserve History</router-link>
            </nav>
<div class="row justify-content-center m-3 p-3">
    <template v-for="room in rooms" :key="room">
        <div class="col-lg-3 col-md-3 m-0 p-1" style="width:23%">
          <div class="card h-100" >
            <img class="card-img-top" :src="'http://127.0.0.1:8000/'+room.file" alt="Card image cap" style="height:50%">
            <div class="card-body">
            <h5 class="card-title">{{room.name}}</h5>
            <p class="card-text">{{room.description}}</p>
            <p class="card-text"><small class="text-muted">{{room.price}}</small></p>
            <router-link :to="{name: 'reserve', params:{id: room.id} }"  class="btn btn-secondary btn-block" >Book This Room</router-link>

            </div>
          </div>
        </div>
    </template>
    



        </div>

    </div>
</template>
<script>
export default {

    created() {
   this.getData();
  },  

    data() {
        return {
            rooms:{},
        }
    },

    methods: {
        getData(){
            axios.get('/api/getData').then(res=>{
                this.rooms=res.data;
            })
        },


        
    },
    
}
</script>
<style lang="">
    
</style>