<template>
    <div id="app">
        <div class="grid-y fullheight">
            <layout-header></layout-header>
            <layout-main></layout-main>
            <layout-footer></layout-footer>
        </div>
    </div>
</template>

<script>
    import LayoutHeader from "./layouts/Header";
    import LayoutMain from "./layouts/Main";
    import LayoutFooter from "./layouts/Footer";

    export default {
        components: {
            LayoutFooter,
            LayoutMain,
            LayoutHeader
        }
    }
</script>

<style lang="scss">
    @import "styles/app";
</style>
