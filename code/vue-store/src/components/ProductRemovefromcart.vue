<template>
    <div class="component__product_removefromcart">
        <button
                class="btn btn--removeformcart btn--normal btn--black"
                type="button"
                v-on:click="removeFromCart(product)"
        >
            <font-awesome-icon icon="times"/>
        </button>
    </div>
</template>

<script>
    export default {
        name: 'component-productremovefromcart',
        props: ['product']
    }
</script>

<style lang="scss">

</style>