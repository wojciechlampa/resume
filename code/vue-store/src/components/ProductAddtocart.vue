<template>
    <div class="component__product_addtocart">
        <button
                class="btn btn--addtocart btn--normal btn--black"
                type="button"
                v-on:click="addToCart(product)"
        >
            <font-awesome-icon icon="cart-plus"/>
            <span>Add to cart</span>
        </button>
    </div>
</template>

<script>
    export default {
        name: 'component-productaddtocart',
        props: ['product']
    }
</script>

<style lang="scss">

</style>