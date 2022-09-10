<template>
</template>
<script type="text/javascript">
export default {

    created(){
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        this.$router.push('/')
    }
    
}
</script>
<style lang="">
    
</style>