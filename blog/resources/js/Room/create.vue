<template lang="">
  <div class="container">
  <div class="card card-create mx-auto mt-5" style="width: 55rem">
    <div class="card-header">Create Room</div>
    <div class="card-body">
      <form @submit.prevent="productInsert" enctype="multipart/form-data">
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
                 <input type="file" name="photo" class="btn btn-info" @change="onFileselected">
                </div>
               </div>
                <div class="col-md-6">
                  <div class="form-label-group">

                    <img :src="form.file" style="height:100px; width: 200px;">
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
      name: null,
      size: null,
      maximum_occupancy: null,
      price: null,
      amenities: null,
      description: null,
      file: null
    },
    amenities:{},
    
  }
},
methods: {
onFileselected(event){
          this.file=event.target.files[0];
          if (this.file.size > 1048770) {
            Notification.image_validation()
          }else{
            let reader = new FileReader();
            reader.onload = event => {
              this.form.file = event.target.result
              //console.log(event.target.result);
            };
            reader.readAsDataURL(this.file);
          }
        },
          productInsert(){
            const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }

            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('name', this.form.name);
            formData.append('size', this.form.size);
            formData.append('maximum_occupancy', this.form.maximum_occupancy);
            formData.append('price', this.form.price);
            formData.append('amenities', this.form.amenities);
            formData.append('description', this.form.description);

          axios.post('/api/upload',formData, config)
          .then((res) => {
            this.$router.push('/index')
          })
          .catch(error => {
          })
        },
  
},
created(){
  axios.get('/api/getData').then(res=>{
       this.amenities=res.data;
  })
}
}
</script>
<style lang="">
  
</style>