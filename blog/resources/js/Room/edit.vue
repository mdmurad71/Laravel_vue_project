<template lang="">
    <div class="container">
    <div class="card card-create mx-auto mt-5" style="width: 55rem">
      <div class="card-header">Update Room</div>
      <div class="card-body">
        <form @submit.prevent="roomUpdate" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="Name" id="Name" class="form-control" placeholder="First name" required="required" v-model="form.name">
                  <label for="Name">name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                <input type="size" id="size" class="form-control" placeholder="Email address" required="required" v-model="form.size">
                <label for="size">size</label>

                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="occupancy" id="occupancy" class="form-control" placeholder="occupancy" required="required" v-model="form.maximum_occupancy">
                  <label for="occupancy">Maximum Occupancy</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="price" id="price" class="form-control" placeholder="price" required="required" v-model="form.price">
                  <label for="price">price</label>
                </div>
              </div>
            </div>
          </div>



          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
              <div class="form-label-group">
                <textarea type="Description" class="form-control" id="Textarea" rows="3" placeholder="Description" v-model="form.description"></textarea>
              </div>
          
             </div>
              <div class="col-md-6">
                <div class="form-group">
                <label for="exampleFormControlSelect1">Amenities</label>
					      <select class="form-control" id="exampleFormControlSelect1" v-model="form.amenities">
					      <option :value="amenity.name" v-for="amenity in amenities">{{ amenity.name }}</option>
					    </select>
                </div>
              </div>
           </div>
          
        </div>
           


              <div class="form-group">
	              <div class="form-row">

	               <div class="col-md-6">
	                <div class="form-label-group">
	                 <input type="file" name="file" class="btn btn-info" @change="onFileselected">
	                </div>
	               </div>
	                <div class="col-md-6">
                    <div class="form-label-group">

	                	  <img :src="form.photo" style="height:100px; width: 200px;">
                    </div>
	                </div>
	             </div>
	          </div>       
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

      </div>
    </div>
  </div>
</template>
<script>
export default {

    mounted(){
            if (!User.loggedIn()) {
               this.$router.push('/' )
            } 
        },

  data() {
    return {

      form:{
        name: '',
        size: '',
        maximum_occupancy: '',
        price: '',
        amenities: '',
        description: '',
        photo:''
      },
      amenities:{},
      
    }
  },

  methods: {
	onFileselected(event){
        		let file=event.target.files[0];
        		if (file.size > 1048770) {
        		}else{
        			let reader = new FileReader();
        			reader.onload = event => {
        				this.form.photo = event.target.result

        				//console.log(event.target.result);
        			};
        			reader.readAsDataURL(file);

        		}
        	},
        	roomUpdate(){
        		let id = this.$route.params.id
        		axios.post('/api/updateRoom/'+id, this.form)
        		.then(() => {
        			this.$router.push('/index')
        		})
        		.catch(error => {

                })
        	},
        	
    
  },
  created(){

        	let id = this.$route.params.id
        	axios.get('/api/showData/'+id)
        	.then(({data}) => (this.form = data))
        	.catch()

    axios.get('/api/getData').then(res=>{
         this.amenities=res.data;
    })
  }

    
}
</script>
<style lang="">
    
</style>