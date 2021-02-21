<template>
    <nav>        
        <router-link :to="{name: 'Home'}">Home</router-link> <!-- Router link using name --> 
        <router-link to="/about">About</router-link> <!-- Router link biasa --> 
        <router-link :to="{ name: 'User' }">User</router-link>
    </nav>
</template>