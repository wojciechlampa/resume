<template>
    <section class="section__featuredproducts">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div
                        class="cell small-12 medium-6 large-3"
                        v-for="(product, index) in products.slice(0,4)"
                        v-bind:key="index"
                >
                    <component-productsmall v-bind:product="product"/>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {mapState} from 'vuex'

    import ComponentProductsmall from "../components/ProductSmall";

    export default {
        components: {ComponentProductsmall},
        name: 'section-products',
        computed: {
            ...mapState([
                'products'
            ])
        }
    }
</script>

<style lang="scss">
    @import "../styles/sections/featuredproducts";
</style>