<template>
    <section class="section__catalog">
        <div class="grid-x grid-margin-x">
            <div
                    class="cell small-12 medium-6 large-4"
                    v-for="(product, index) in products"
                    v-bind:key="index"
            >
                <component-productsmall v-bind:product="product"/>
            </div>
        </div>
    </section>
</template>

<script>
    import ComponentProductsmall from "../components/ProductSmall";

    export default {
        components: {ComponentProductsmall},
        name: 'section-catalog',
        props: [
            'products'
        ]
    }
</script>

<style lang="scss">
    @import "../styles/sections/catalog";
</style>