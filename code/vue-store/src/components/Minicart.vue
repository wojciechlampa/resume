<template>
    <div class="component__minicart">
        <button
                class="component__minicart_button btn"
                v-on:click="minicartSwitch"
        >
            <font-awesome-icon icon="shopping-cart"/>
            <span v-if="cart.totalCount > 0">{{cart.totalCount}}</span>
        </button>
        <template v-if="minicartOpen">
            <div class="component__minicart_overlay"></div>
            <div class="component__minicart_box">
                <div class="grid-y">
                    <div class="cell">
                        <div class="grid-x grid-margin-x">
                            <div class="cell auto">
                                <div class="component__minicart_box_title">
                                    Shopping Cart
                                </div>
                            </div>
                            <div class="cell shrink">
                                <button
                                        class="component__minicart_box_close btn btn--normal btn--black"
                                        type="button"
                                        v-on:click="minicartSwitch"
                                >
                                    <font-awesome-icon icon="times"/>
                                </button>
                            </div>
                        </div>
                    </div>
                    <template v-if="cart.totalCount > 0">
                        <div class="cell">
                            <div class="component__minicart_box_products">
                                <ul v-bind:cartcount="cart.totalCount">
                                    <li
                                            class="component__minicart_box_products_single"
                                            v-for="(product, index) in cart.products"
                                            v-bind:key="index"
                                    >
                                        <div class="grid-x grid-margin-x align-middle">
                                            <div class="cell shrink">
                                                <router-link v-bind:to="{name: 'product', params: {id: product.id}}">
                                                    <img
                                                            class="component__minicart_box_products_single_image"
                                                            v-bind:src="require(`@/assets/${product.thumbnail}`)"
                                                            v-bind:alt="product.name">
                                                </router-link>
                                            </div>
                                            <div class="cell auto">
                                                <div class="component__minicart_box_products_single_title">
                                                    {{product.name}} <span>x {{product.count}}</span>
                                                </div>
                                                <div class="component__minicart_box_products_single_price">
                                                    <span>{{product.price | price}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="cell">
                            <div class="component__minicart_box_summary">
                                <div class="grid-x grid-margin-x">
                                    <div class="cell shrink">
                                        <div class="component__minicart_box_summary_label">
                                            Subtotal:
                                        </div>
                                    </div>
                                    <div class="cell auto">
                                        <div class="component__minicart_box_summary_amount">
                                            {{cartTotal() | price}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cell">
                            <div class="component__minicart_box_actions">
                                <div class="grid-x grid-margin-x">
                                    <div class="cell small-6">
                                        <router-link
                                                class="component__minicart_box_actions_cart btn btn--normal btn--border btn--white"
                                                type="button"
                                                v-bind:to="{name: 'cart'}"
                                                v-on:click.native="minicartSwitch"
                                        >
                                            View cart
                                        </router-link>
                                    </div>
                                    <div class="cell small-6">
                                        <router-link
                                                class="component__minicart_box_actions_cart btn btn--normal btn--black"
                                                type="button"
                                                v-bind:to="{name: 'checkout'}"
                                                v-on:click.native="minicartSwitch"
                                        >
                                            Checkout
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="cell">
                            <div class="component__minicart_box_message">
                                No products in the cart
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </template>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'component-minicart',
        data: function () {
            return {
                minicartOpen: false
            }
        },
        computed: {
            ...mapState(['cart'])
        },
        methods: {
            minicartSwitch: function () {
                this.minicartOpen = !this.minicartOpen;
            }
        }
    }
</script>

<style lang="scss">
    @import "../styles/components/minicart";
</style>