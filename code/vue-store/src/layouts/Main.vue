<template>
    <main class="layout__main cell auto">
        <transition name="fade" mode="out-in">
            <router-view v-bind:key="$route.fullPath"/>
        </transition>
    </main>
</template>

<script>
    export default {
        name: 'layout-main'
    }
</script>

<style lang="scss">
    @import "../styles/layouts/main";
</style>