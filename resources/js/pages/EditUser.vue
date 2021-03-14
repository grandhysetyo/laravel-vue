<template>
    <div>
        <h1>Edit User</h1>
        <form v-on:submit.prevent="handleUpdate" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" v-model="user.name">
                <span class="error" v-if="errors.name">
                    {{errors.name[0]}}
                </span>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email"  v-model="user.email">
                <span class="error" v-if="errors.email">
                    {{errors.email[0]}}
                </span>
            </div>
           
            <button type="submit">Edit</button>
        </form>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data(){
        return {
            user: {
                name: '',
                email: ''                
            },
            errors: {}            
        }      
    },
    mounted(){
        this.getUser()
    },
    methods: {
        getUser(){
            axios.get('/api/users/'+this.id).then((res) => {
                console.log(res.data)
                this.user = {
                    name: res.data.name,
                    email: res.data.email
                }
            })
        },  
        handleUpdate() {
            console.log(this.id)
            axios.put('/api/users/'+this.id, this.user).then((response)=> {
                if(response.data.status){
                    // console.log(response)
                    this.$noty.success(response.data.message)                   
                    this.$router.push({
                        name: 'User'
                    })
                }
                
            }).catch((error)=> {
                if(error.response.status == 403){
                    this.errors = error.response.data.message
                }                
                // console.log(error)
            })
        }
    }
}
</script>
<style>
    .input-group {        
        margin-bottom: 5px;
    }
    .input-group span {
        color: brown;
    }
    
</style>