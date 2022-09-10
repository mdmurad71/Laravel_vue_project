<template lang="">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form @submit.prevent="signup">
           <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="Full Name" v-model="form.name" required="required">
                  <label for="firstName">Full Name</label>
                </div>
              </div>

           
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" v-model="form.email" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="form.password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" v-model="form.confirm_password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Register</button>
        </form>
        <div class="text-center">
          <router-link class="d-block small mt-3" to="/">Login Page</router-link>
        </div>
      </div>
    </div>
  </div>

</template>
<script>

export default {

  created(){
    if(User.loggedIn()){
      this.$router.push('/home')
    }
  },


  data() {
    return {
      form:{
        name: "",
        email: "",
        password: "",
        confirm_password: ""
      }
    }
  },

  methods: {
    signup(){
      axios.post('/api/auth/signup', this.form).then(res=>{

        User.responseAfterLogin(res)
          this.$router.push('/home')
      })
    }
  },
    
}
</script>
<style lang="">
    
</style>