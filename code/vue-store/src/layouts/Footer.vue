<template>
    <footer class="layout__footer text-center cell shrink">
        <div class="layout__footer_top">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
                        <component-nav/>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout__footer_middle">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
                        <component-social/>
                    </div>
                </div>
            </div>
        </div>
        <div class="layout__footer_bottom">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
                        <component-copyright/>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    import ComponentNav from "../components/Nav";
    import ComponentSocial from "../components/Social";
    import ComponentCopyright from "../components/Copyright";

    export default {
        components: {
            ComponentCopyright,
            ComponentSocial,
            ComponentNav
        },
        name: 'layout-footer'
    }
</script>

<style lang="scss">
    @import "../styles/layouts/footer";
</style>