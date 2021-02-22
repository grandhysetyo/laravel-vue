<template>
    <div>
        <h1>Register</h1>
        <form v-on:submit.prevent="handleSubmit" action="/users" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" v-model="form.name">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email"  v-model="form.email">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password"  v-model="form.password">
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return {
            form: {
                name: '',
                email: '',
                password: ''
            }
        }
    },
    methods: {
        handleSubmit() {
            // console.log(this.form)
            axios.post('/api/users', this.form).then((response)=> {
                if(response.data.status){
                    console.log(response)
                    alert(response.data.message)                    
                    this.$router.push({
                        name: 'User'
                    })
                }
                
            }).catch((error)=> {
                console.log(error)
            })
        }
    }
}
</script>
<style>
    .input-group {        
        margin-bottom: 5px;
    }
    
</style>