<template>
    <div class="component__productsmall">
        <div class="grid-y">
            <div class="cell">
                <router-link v-bind:to="{name: 'product', params: {id: product.id}}">
                    <img
                            class="component__productsmall_image"
                            v-bind:src="require(`@/assets/${product.thumbnail}`)"
                            v-bind:alt="product.name">
                </router-link>
            </div>
            <div class="cell">
                <div class="component__productsmall_buttons">
                    <div class="grid-x">
                        <div class="cell auto">
                            <component-productaddtocart v-bind:product="product"/>
                        </div>
                        <div class="cell shrink">
                            <router-link
                                    class="component__productsmall_show btn btn--small btn--white"
                                    v-bind:to="{name: 'product', params: {id: product.id}}"
                            >
                                <font-awesome-icon v-bind:icon="['far', 'eye']"/>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell">
                <div class="component__productsmall_name">{{product.name}}</div>
                <div class="component__productsmall_price">{{product.price | price}}</div>
            </div>
        </div>
    </div>
</template>

<script>
    import ComponentProductaddtocart from "./ProductAddtocart";

    export default {
        components: {ComponentProductaddtocart},
        name: 'component-productsmall',
        props: ['product']
    }
</script>

<style lang="scss">
    @import "../styles/components/productsmall";
</style>