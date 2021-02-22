<template>        
    <div>
        <h1>Daftar User</h1>        
        <ul>
            <li v-for="user in users" v-bind:key="user.id"> 
                <router-link :to="profile_uri(user.id)">{{user.name}}</router-link>                                   
            </li>
        </ul>
        <ul>
            <li v-for="user in users" v-bind:key="user.id"> 
                <!-- @clik sama dengan v-on + prevent untuk tidak redirect ke a href nya -->  
                <a href="" @click.prevent="lihat_user(user.id)">{{user.name}}</a>                     
            </li>
                
        </ul>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            users: [],
            detailuser: {}
        }
    },
    watch: {
        '$route': 'getUsers' //sedangkan watch dipanggil ketika route dari user nya berubah
    },
    mounted(){ // mounted dipakai tiap kali uri component diload kayak constructor
        this.getUsers()
    },
    methods: {
        getUsers(){
            axios.get('/api/users').then((res) => {
                //console.log(res.data)
                this.users = res.data
                if(this.id) {
                    this.detailuser = this.users.filter(item => item.id == this.id)[0]
                    console.log(this.detailuser)
                }
            })
            //atau menggunakan fetch api
            // fetch('/api/users').then(response => response.json()).then(data=>{
            //     console.log(data)
            //     this.users = data
            // })
        },
        profile_uri(id){
            return 'user/' + id
        },
        lihat_user(id){
            this.$router.push({
                name: 'Profile',
                params: {id:id} 
            })
        },
        list_user(){
            this.$router.push('/user')
        }
    }
}
</script>