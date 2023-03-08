<template>
    <div class="component__cartproducts">
        <table v-bind:cartcount="cart.totalCount">
            <thead>
            <tr>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr
                    class="component__cartproducts_single"
                    v-for="(product, index) in cart.products"
                    v-bind:key="index"
            >
                <td>
                    <router-link v-bind:to="{name: 'product', params: {id: product.id}}">
                        <img
                                class="component__cartproducts_single_image"
                                v-bind:src="require(`@/assets/${product.thumbnail}`)"
                                v-bind:alt="product.name">
                    </router-link>
                </td>
                <td>
                    <div class="component__cartproducts_single_title">
                        {{product.name}}
                    </div>
                </td>
                <td>
                    <div class="component__cartproducts_single_price">
                        {{product.price | price}}
                    </div>
                </td>
                <td>
                    <div class="component__cartproducts_single_quantity">
                        <button
                                class="btn btn--icon btn--black"
                                v-on:click="removeFromCart(product)">
                            -
                        </button>
                        <span> x {{product.count}} </span>
                        <button
                                class="btn btn--icon btn--black"
                                v-on:click="addToCart(product)">
                            +
                        </button>
                    </div>
                </td>
                <td>
                    <div class="component__cartproducts_single_total">
                        {{product.price * product.count | price}}
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'component-cartproducts',
        computed: {
            ...mapState(['cart'])
        }
    }
</script>

<style lang="scss">
    @import './../styles/components/cartproducts';
</style>