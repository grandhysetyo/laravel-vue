<template>    
    <div v-if="name">
        <h1>Hello User, {{name}}</h1>
    </div>
    <div v-else>
        <h1>Daftar User</h1>
    </div>
</template>

<script>
export default {
    props: ['name']
}
</script>