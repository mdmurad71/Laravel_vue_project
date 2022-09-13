<template lang="">
<div class="card bg-dark" style="height:800px">
    <router-link to="/" type="button" class="btn btn-danger btn-block" style="width: 100%;">Back to Home</router-link>

    <div class="container-fluid">
                <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-6 mb-5" style="width:40%">
        <templete v-for="room in rooms" :key="room">
                <div class="card">
                    <div class="card-header">
                        <img class="card-img-top" src="https://www.europahotelbelfast.com/wp-content/uploads/2021/12/Superior-Room-1-1366x768-fp_mm-fpoff_0_0.jpg" alt="Card image cap" style="height:100%">

                    </div>
                <div class="card-body">
                    <h5 class="card-title">{{room.name}}</h5>
                   <p class="card-text">{{room.description}}</p>
                  <p class="card-text"><small class="text-muted">{{room.price}}Tk</small></p>
                </div>
                </div>
            </templete>
            </div>

        <div class="col-lg-6 col-md-6" style="width:50%">
            <div class="card justify-content-end mt-5">
                <div class="card-header">
                    Please Reserve This
                </div>
                <div class="card-body mt-3">
                <form  enctype="multipart/form-data"> 
                    <input type="name" id="name" class="form-control mb-4" placeholder="Name" v-model="form.name"  required="required">
                    <input type="hidden" id="phone" class="form-control mb-4" placeholder="Phone" v-model="form.phone" required="required" >                 
                    <input type="check_in" id="cheak_in" class="form-control mb-4" placeholder="Check In" v-model="form.check_in" required="required">
                    <input type="check_out" id="check_out" class="form-control mb-4" placeholder="Check Out" v-model="form.check_out" required="required" >
                    <button @click.prevent="reserve" type="button" class="btn btn-primary btn-block" style="width: 100%;">Submit</button>

                </form>
            </div>
            </div>
            </div>
        </div>
        </div>
    </div>
  
</template>
<script>

export default {



    

    mounted(){
            if (localStorage.getItem('phone')===null) {
               this.$router.push('/login' )
            } 
        },


    created() {

   let id = this.$route.params.id
        	axios.get('/api/showData/'+id)
        	.then(({data}) => (this.rooms = data))
        	.catch()

  },  

    data() {
        return {
            rooms:{},
            form:{
                name: '',
                phone: localStorage.getItem('phone'),
                check_in: '',
                check_out: '',
            }


        }
    },

    methods: {
    reserve(){

        let id = this.$route.params.id;
        let phone= localStorage.getItem('phone');
        axios.post('/api/reserveRoom/'+id, this.form).then(res=>{
            this.$router.push('/list')
        }).catch()
     },



    }, 
}
</script>
<style lang="">
    
</style>