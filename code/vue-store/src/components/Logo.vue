<template>
    <div class="component__logo">
        <router-link v-bind:to="{name: 'home'}">
            SoftwareMill <span>Store</span>
        </router-link>
    </div>
</template>

<script>
    export default {
        name: 'component-logo'
    }
</script>

<style lang="scss">
    @import "../styles/components/logo";
</style>