<template>
    <nav class="component__nav">
        <router-link v-bind:to="{name: 'shop', params: {slug: 'mens'}}">Mens</router-link>
        <router-link v-bind:to="{name: 'shop', params: {slug: 'womens'}}">Womens</router-link>
        <router-link v-bind:to="{name: 'about'}">About</router-link>
    </nav>
</template>

<script>
    export default {
        name: 'component-nav'
    }
</script>

<style lang="scss">
    @import "../styles/components/nav";
</style>