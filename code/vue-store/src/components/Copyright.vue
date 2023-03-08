<template>
    <div class="component__copyright">
        ⓒ {{year}} SoftwareMill Store | All rights reserved.
    </div>
</template>

<script>
    export default {
        name: 'component-copyright',
        computed: {
            year() {
                return new Date().getFullYear();
            }
        }
    }
</script>

<style lang="scss">
    @import "../styles/components/copyright";
</style>