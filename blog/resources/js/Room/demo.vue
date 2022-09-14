<template lang="">
    <div>
        <form @submit.prevent="insertData" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name" v-model="form.name"/>
            <input type="text" name="size" placeholder="size" v-model="form.size"/>
            <input type="text" name="maximum_occupancy" placeholder="maximum_occupancy" v-model="form.maximum_occupancy"/>
            <input type="text" name="price" placeholder="price" v-model="form.price"/>
            <input type="text" name="amenities" placeholder="amenities" v-model="form.amenities"/>
            <input type="text" name="description" placeholder="description" v-model="form.description"/>

            <input type="file" name="file" v-on:change="onFileselected" />
            <button type="submit" class="btn btn-primary btn-block">Submit</button>

        </form>
        
    </div>
</template>
<script>
export default {
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
            formData.append('name', this.name);
            formData.append('size', this.size);
            formData.append('maximum_occupancy', this.maximum_occupancy);
            formData.append('price', this.price);
            formData.append('amenities', this.amenities);
            formData.append('description', this.description);


                        axios.post('/api/insertData', formData, config).then(res=>{

                        })
                    }
    },
}
</script>
<style lang="">
    
</style>