<template lang="">
    <div>
        <form @submit.prevent="insertData" enctype="multipart/form-data">
            <input type="text" name="name" class="form-control" placeholder="Name" v-model="form.name"/>

            <input type="file" name="file" v-on:change="onFileselected" />
            <button type="submit" class="btn btn-primary btn-block">Submit</button>

        </form>
        
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: {
                name: null,
                file: null
            }
        }
    },

    methods: {

        onFileselected(e){
            this.file= e.target.files[0];
            // console.log(file)
            
        },
        insertData(){

        let currentObj = this;
        
        const config = {
            headers: { 'content-type': 'multipart/form-data' }
        }

            let formData = new FormData();
            formData.append('file', this.file);
            formData.append('name', this.form.name);



                        axios.post('/api/insertData', formData, config).then(res=>{

                        })
                    }
    },
}
</script>
<style lang="">
    
</style>