<template>
    <div class="page__checkout">
        <div class="grid-container">
            <div class="grid-y">
                <div class="cell">
                    <h1 class="page__checkout_title">Checkout</h1>
                </div>
                <div class="cell">
                    <form action="">
                        <div class="grid-x grid-margin-x">
                            <div class="cell small-12 medium-4 medium-order-2">
                                <component-checkoutsummary/>
                            </div>
                            <div class="cell small-12 medium-8 medium-order-1">
                                <component-checkoutbillings/>
                                <component-checkoutpayments/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ComponentCheckoutsummary from "../components/CheckoutSummary";
    import ComponentCheckoutbillings from "../components/CheckoutBillings";
    import ComponentCheckoutpayments from "../components/CheckoutPayments";

    import {mapState} from 'vuex'

    export default {
        components: {
            ComponentCheckoutpayments,
            ComponentCheckoutbillings,
            ComponentCheckoutsummary
        },
        name: 'views-checkout',
        computed: {
            ...mapState(['cart'])
        },
        methods: {
            validateForm: function () {
                this.$validator.validateAll().then(() => {
                    if (!this.errors.any()) {
                        this.$store.dispatch('updateCheckoutProducts', this.cart.products);
                        this.$store.dispatch('clearCart');
                        this.$router.push('summary')
                    }
                })
            }
        },
        provide() {
            return {
                $validator: this.$validator,
            };
        }
    }
</script>

<style lang="scss">
    @import './../styles/views/checkout';
</style>
