<template>    
    <div v-if="$route.params.name">
        <h1>Hello User, {{$route.params.name}}</h1>
    </div>
    <div v-else>
        <h1>Daftar User</h1>
    </div>
</template>