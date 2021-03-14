<template>    
    <div v-if="id">
        <h1>Hello User, {{detailuser.name}}</h1>   
        <p>Email : {{detailuser.email}}</p> 
        <p><a href="" v-on:click.prevent="handlingDelete">Delete</a></p>    
        <p><router-link :to="edit_uri(id)">Edit</router-link></p> 
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
        handlingDelete() {
            if(confirm('Apakah anda yakin menghapus data ?')){
                axios.delete('/api/users/'+this.id).then((res) => {
                    if(res.data.status){
                        // console.log(response)
                        this.$noty.success(res.data.message)                   
                        this.$router.push({
                            name: 'User'
                        })
                    }  
                })
            } else {
                return false
            }
            
        },
        edit_uri(id){
            return  id +'/edit'
        },
        list_user(){
            this.$router.push('/user')
        }
        
    }
}
</script>