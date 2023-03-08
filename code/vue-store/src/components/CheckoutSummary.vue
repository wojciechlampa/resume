<template>
    <div class="component__checkoutsummary">
        <div class="grid-y">
            <div class="cell">
                <div class="component__checkoutsummary_title">
                    Checkout summary
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_label">
                    Products
                </div>
                <div class="component__checkoutsummary_products">
                    <table v-bind:cartcount="cart.totalCount">
                        <tbody>
                        <tr
                                class="component__checkoutsummary_products_single"
                                v-for="(product, index) in cart.products"
                                v-bind:key="index"
                        >
                            <td>
                                <div class="component__checkoutsummary_products_single_name">
                                    {{product.name}} x {{product.count}}
                                </div>
                            </td>
                            <td>
                                <div class="component__checkoutsummary_products_single_price">
                                    {{product.price * product.count | price}}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <template v-if="checkout.shipping === 'standardShipping'">
                <div class="cell">
                    <div class="component__checkoutsummary_label">
                        Subtotal
                    </div>
                    <div class="component__checkoutsummary_subtotal">
                        {{cartTotal() | price}}
                    </div>
                </div>
                <div class="cell">
                    <div class="component__checkoutsummary_label">
                        Shipping
                    </div>
                    <div class="component__checkoutsummary_shipping">
                        {{shippingCost | price}}
                    </div>
                </div>
            </template>
            <div class="cell">
                <div class="component__checkoutsummary_label">
                    Total
                </div>
                <div class="component__checkoutsummary_total">
                    {{checkoutTotal | price}}
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_title">
                    Payment methods
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_payments">
                    <ul>
                        <li>
                            <label for="payment-cashondelivery">
                                <input
                                        type="radio"
                                        id="payment-cashondelivery"
                                        name="payments"
                                        value="cashOnDelivery"
                                        v-model="payment"
                                        v-validate="'required'"
                                >
                                <span>Cash on delivery</span>
                            </label>
                        </li>
                        <li>
                            <label for="payment-creditcard">
                                <input
                                        type="radio"
                                        id="payment-creditcard"
                                        name="payments"
                                        value="creditCard"
                                        v-model="payment"
                                >
                                <span>Credit card</span>
                            </label>
                        </li>
                        <li>
                            <span class="form__error" v-show="errors.has('payments')">
                                {{ errors.first('payments') }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_title">
                    Delivery options
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_deliveries">
                    <ul>
                        <li>
                            <label for="delivery-standardshipping">
                                <input
                                        type="radio"
                                        id="delivery-standardshipping"
                                        name="deliveries"
                                        value="standardShipping"
                                        v-model="shipping"
                                        v-validate="'required'"
                                >
                                <span>Standard shipping</span>
                            </label>
                        </li>
                        <li>
                            <label for="delivery-selfpickup">
                                <input
                                        type="radio"
                                        id="delivery-selfpickup"
                                        name="deliveries"
                                        value="selfPickup"
                                        v-model="shipping"
                                >
                                <span>Self pick-up</span>
                            </label>
                        </li>
                        <li>
                            <span class="form__error" v-show="errors.has('deliveries')">
                                {{ errors.first('deliveries') }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="cell">
                <div class="component__checkoutsummary_actions">
                    <button
                            class="component__checkoutsummary_actions btn btn--normal btn--black"
                            type="button"
                            v-on:click="submitOrder()"
                    >
                        Place order
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import {mapFields} from 'vuex-map-fields'

    export default {
        name: 'component-checkoutsummary',
        data: function () {
            return {
                shippingCost: 10
            }
        },
        computed: {
            ...mapState([
                'cart',
                'checkout'
            ]),
            ...mapFields([
                'checkout.payment',
                'checkout.shipping'
            ]),
            checkoutTotal: function () {
                return this.checkout.shipping === 'standardShipping' ? this.cartTotal() + this.shippingCost : this.cartTotal();
            }
        },
        methods: {
            submitOrder: function () {
                this.$parent.validateForm();
            }
        },
        inject: ['$validator'],
    }
</script>

<style lang="scss">
    @import './../styles/components/checkoutsummary';
</style>