<template>
    <div>
        <h1>Register</h1>
        <form v-on:submit.prevent="handleSubmit" action="/users" method="post">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="name" v-model="form.name">
                <span class="error" v-if="errors.name">
                    {{errors.name[0]}}
                </span>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email"  v-model="form.email">
                <span class="error" v-if="errors.email">
                    {{errors.email[0]}}
                </span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password"  v-model="form.password">
                <span class="error" v-if="errors.password">
                    {{errors.password[0]}}
                </span>
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
            },
            errors: {}            
        }        
    },
    methods: {
        handleSubmit() {
            // console.log(this.form)
            axios.post('/api/users', this.form).then((response)=> {
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
                // console.log(this.errors)
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