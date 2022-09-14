<template lang="">
<div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12">

                <div class="card">
                    <div class="card-header">
                        <p>History List</p>
                    </div>
                    <template v-for="list in lists" :key="list">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 justify-content-center">
                                <img class="card-img" src="https://www.europahotelbelfast.com/wp-content/uploads/2021/12/Superior-Room-1-1366x768-fp_mm-fpoff_0_0.jpg" alt="Card image cap" style="height:100%">
                            </div>
                            <div class="col-lg-6 col-md-6 text-center text-green" style="color:green">
                                <h5 class="mid">Room name: {{list.room.name}}</h5>
                                <h5 class="mid"> price: {{list.room.price}}</h5>
                                <h5 class="mid text-primary">Phone No: {{list.phone}}</h5>
                                <h5 class="mid">check in: {{list.check_in}}</h5>
                                <h5 class="mid">check out: {{list.check_out}}</h5>


                            </div>
                            <div class="col-lg-3 col-md-3 mt-3">
                                <button @click.prevent="deleteData(list.id)"  class="btn btn-danger btn-lg  text-center m-1 p-1" style="text-allign:center">Delete</button>
                                <button @click.prevent="confirmOrder(list.id)" class="btn btn-success btn-lg text-center m-1 p-1" style="text-allign:center">Confirm</button>

                            </div>

                        </div>
                    </div>
                </template>
                </div>
            </div>

        </div>



        
    </div>
</template>
<script>
export default {
    mounted(){
    if (!User.loggedIn()) {
        this.$router.push('/')
    } 
},


    created() {
            this.reserveList();
        },

    data() {
        return {
            lists:{}
        }
    },

    methods: {
        reserveList(){
            axios.get('/api/reserveList').then(res=>{
                this.lists= res.data;
            }).catch();
        },

        deleteData(id){
            axios.delete('/api/deleteRequest/'+id).then(res=>{
                this.reserveList();
            }).catch()
        },

        confirmOrder(id){
            axios.post('/api/confirmOrder/'+id).then(res=>{
                this.$router.push('/confirmList');
            }).catch()
        }
    },
    
}
</script>
<style lang="">
    
</style>