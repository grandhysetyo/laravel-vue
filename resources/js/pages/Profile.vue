<template>    
    <div v-if="id">
        <h1>Hello User, {{detailuser.name}}</h1>   
        <p>Email : {{detailuser.email}}</p>     
        <p>
            <router-link to="/user">back</router-link> <!-- atau bisa menggunakan -->
            <a href="" v-on:click.prevent="list_user()">list user</a> <!-- prevent untuk tidak redirect ke a href nya -->
        </p>
        
    </div>
    
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            detailuser: {}
        }
    },
    mounted(){ // mounted dipakai tiap kali uri component diload kayak constructor
        this.getUser()
    },
    methods: {
        getUser(){
            axios.get('/api/users/'+this.id).then((res) => {
                // console.log(res.data)
                this.detailuser = res.data              
            })
        },        
        list_user(){
            this.$router.push('/user')
        }
    }
}
</script>