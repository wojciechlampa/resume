<template>
    <header class="layout__header cell shrink">
        <div class="layout__header_top">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell text-center medium-text-left medium-auto">
                        <component-ticker/>
                    </div>
                    <div class="cell text-center medium-text-right medium-shrink">
                        <component-hours/>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout__header_bottom">
            <div class="grid-container">
                <div class="grid-x align-middle">
                    <div class="cell medium-shrink text-center">
                        <component-logo/>
                    </div>
                    <div class="cell medium-auto">
                        <div class="grid-x">
                            <div class="cell auto text-left medium-text-center align-self-middle">
                                <component-nav/>
                            </div>
                            <div class="cell shrink">
                                <component-minicart/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>

    import ComponentTicker from "../components/Ticker";
    import ComponentLogo from "../components/Logo";
    import ComponentMinicart from "../components/Minicart";
    import ComponentNav from "../components/Nav";
    import ComponentHours from "../components/Hours";

    export default {
        components: {
            ComponentHours,
            ComponentNav,
            ComponentMinicart,
            ComponentLogo,
            ComponentTicker},
        name: 'layout-header'
    }
</script>

<style lang="scss">
    @import "../styles/layouts/header";
</style>