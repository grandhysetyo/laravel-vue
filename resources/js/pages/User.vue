<template>    
    <div v-if="username">
        <h1>Hello User, {{username}}</h1>
        <span>
            <router-link to="/user">back</router-link> <!-- atau bisa menggunakan -->
            <a href="" v-on:click.prevent="list_user()">list user</a> <!-- prevent untuk tidak redirect ke a href nya -->
        </span>
    </div>
    <div v-else>
        <h1>Daftar User</h1>
        
        <ul>
            <li v-for="user in users" v-bind:key="user.id"> 
                <router-link :to="profile_uri(user.name)">{{user.name}}</router-link>                                   
            </li>
        </ul>
        <ul>
            <li v-for="user in users" v-bind:key="user.id"> 
                <!-- @clik sama dengan v-on + prevent untuk tidak redirect ke a href nya -->  
                <a href="" @click.prevent="lihat_user(user.name)">{{user.name}}</a>                     
            </li>
                
        </ul>
    </div>
</template>

<script>
export default {
    props: ['username'],
    data() {
        return {
            users: []
        }
    },
    mounted(){
        axios.get('/api/users').then((res) => {
            console.log(res.data)
            this.users = res.data
        })
        //atau menggunakan fetch api
        // fetch('/api/users').then(response => response.json()).then(data=>{
        //     console.log(data)
        //     this.users = data
        // })
    },
    methods: {
        profile_uri(name){
            return 'user/' + name.toLowerCase()
        },
        lihat_user(name){
            this.$router.push({
                name: 'User',
                params: {username:name} 
            })
        },
        list_user(){
            this.$router.push('/user/')
        }
    }
}
</script>