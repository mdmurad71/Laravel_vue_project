<template lang="">
    <div>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">All Room</li>
        </ol>
        <!-- Icon Cards-->
       <div class="row card container">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Room List 
          </div>
          <div class="card-body">
            <div class="card-body">
              <div class="table-responsive">
                <label>Search</label>
               <input type="text" v-model="searchTerm" class="form-control" style="width:200px; "><br>
                <table class="table table-bordered" id="" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Name</th> 
                      <th>Size</th>
                      <th>Photo</th>
                      <th>maximum occupancy</th>
                      <th> Price</th>
                      <th>Amenities</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                
                  <tbody>

                    <tr v-for="room in rooms" :key="room.id">
                      <td>{{ room.name}}</td>
                      <td>{{ room.size}}</td>
                      <td><img :src="room.file" id="em_photo"></td>
                      <td>{{ room.maximum_occupancy }}</td>
                      <td>{{ room.price }}</td>
                      <td>{{ room.amenities }}</td>
                      <td>{{ room.description }}</td>
                      <td>
                        <router-link :to="{name: 'edit', params:{id: room.id} }" class="btn btn-sm btn-info">Edit</router-link>
                        <a @click="deleteRoom(room.id)" class="btn btn-sm btn-danger">Delete</a>
                      </td>
                    </tr>
        
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
   this.datareLoad();
  },

        data() {
            return {
                rooms:{},
                
            }
        },

        methods: {
          deleteRoom(id){
            axios.delete('/api/deleteData/'+id).then(res=>{ 
                this.datareLoad() ;          
            })
          },

          datareLoad(){
            axios.get('/api/roomsData').then(res=>{
            this.rooms = res.data;
          })
        }
  },





    
}
</script>
<style lang="">
    
</style>