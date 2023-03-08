<template>
    <div class="component__checkoutpayments">
        <h2 class="component__checkoutpayments_title">Payments</h2>
        <template v-if="checkout.payment === ''">
            <div class="component__checkoutpayments_comment">
                Please select payment option in the sidebar.
            </div>
        </template>
        <template v-if="checkout.payment === 'cashOnDelivery'">
            <div class="component__checkoutpayments_cashdelivery">
                You will pay us on delivery.
            </div>
        </template>
        <template v-if="checkout.payment === 'creditCard'">
            <div class="component__checkoutpayments_creditcard">
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="cardnumber">Card Number <span>*</span></label>
                    <input
                            type="text"
                            id="cardnumber"
                            name="cardnumber"
                            v-validate="'digits:16|required'"
                            v-model="cardNumber"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('cardnumber')"
                    >
                        {{ errors.first('cardnumber') }}
                    </span>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="fullname">Full name <span>*</span></label>
                    <input
                            type="text"
                            id="fullname"
                            name="fullname"
                            v-validate="'required'"
                            v-model="cardHolder"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('fullname')"
                    >
                        {{ errors.first('fullname') }}
                    </span>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="expirationdate">Expiration date <span>*</span></label>
                    <input
                            type="text"
                            id="expirationdate"
                            name="expirationdate"
                            v-validate="'date_format:MM/YYYY|required'"
                            v-model="cardExpiracy"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('expirationdate')"
                    >
                        {{ errors.first('expirationdate') }}
                    </span>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="cvv">CVV code <span>*</span></label>
                    <input
                            type="text"
                            id="cvv"
                            name="cvv"
                            v-validate="'digits:3|required'"
                            v-model="cardCVV"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('cvv')"
                    >
                        {{ errors.first('cvv') }}
                    </span>
                </div>
            </div>
        </div>
        </template>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import {mapFields} from 'vuex-map-fields'

    export default {
        name: 'component-checkoutpayments',
        computed: {
            ...mapState(['checkout']),
            ...mapFields([
                'checkout.paymentDetails.cardNumber',
                'checkout.paymentDetails.cardHolder',
                'checkout.paymentDetails.cardExpiracy',
                'checkout.paymentDetails.cardCVV'
            ])
        },
        inject: ['$validator'],
    }
</script>

<style lang="scss">
    @import './../styles/components/checkoutpayments';
</style>