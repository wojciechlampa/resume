<template>
    <div class="page__cart">
        <div class="grid-container">
            <div class="grid-y">
                <div class="cell">
                    <h1 class="page__cart_title">Cart</h1>
                </div>
                <div class="cell">
                    <div class="grid-x grid-margin-x">
                        <div class="cell small-12 medium-8">
                            <component-cartproducts/>
                        </div>
                        <div class="cell small-12 medium-4">
                            <component-carttotals/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ComponentCartproducts from "../components/CartProducts";
    import ComponentCarttotals from "../components/CartTotals";

    export default {
        components: {
            ComponentCarttotals,
            ComponentCartproducts},
        name: 'views-cart'
    }
</script>

<style lang="scss">
    @import './../styles/views/cart';
</style>