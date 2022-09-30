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
                      <th>Coustomer Name</th> 
                      <th>Coustomer Contact</th> 
                      <th>Room Name</th>
                      <th>Room price</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Amenities</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                
                  <tbody>
                    
                    <tr v-for="list in lists" :key="list">
                      <td>{{ list.name}}</td>
                      <td>{{ list.phone }}</td>
                      <td>{{ list.room?.name}}</td>
                      <td>{{ list.room?.price }}</td>
                      <td>{{ list.check_in }}</td>
                      <td>{{ list.check_out }}</td>
                      <td>{{ list.room?.amenities }}</td>
                      <td><button @click="sendNotifi" class="btn btn-info">Notification</button></td>

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
   this.confirmList();
  },

        data() {
            return {
                lists:{}
                
            }
        },

        methods: {
          confirmList(){
            axios.get('/api/confirmList').then(res=>{
                this.lists= res.data;
                console.log(this.lists);
            }).catch();
        },

        sendNotifi(){
          Notification.requestPermission().then(perm=>{
            if(perm==='granted'){
              new Notification("Thanks for Reserve");
            }
          })
        }
  },





    
}
</script>
<style lang="">
    
</style>