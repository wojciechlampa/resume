<template>
    <ul class="component__social">
        <li>
            <a href="https://facebook.com" target="_blank">
                <font-awesome-icon v-bind:icon="['fab', 'facebook']"/>
            </a>
        </li>
        <li>
            <a href="https://twitter.com" target="_blank">
                <font-awesome-icon v-bind:icon="['fab', 'twitter']"/>
            </a>
        </li>
        <li>
            <a href="https://instagram.com" target="_blank">
                <font-awesome-icon v-bind:icon="['fab', 'instagram']"/>
            </a>
        </li>
    </ul>
</template>

<script>
    export default {
        name: 'component-social'
    }
</script>

<style lang="scss">
    @import "../styles/components/social";
</style>