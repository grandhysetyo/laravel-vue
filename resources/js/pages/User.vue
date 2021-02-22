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
            users: [
                {
                    id:1,
                    name: 'grandhysetyo'
                },
                {
                    id:2,
                    name: 'sit aet'
                },
                {
                    id:3,
                    name: 'lorem ipsun'
                }
            ]
        }
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