<template>
    <div class="component__checkoutbillings">
        <h2 class="component__checkoutbillings_title">Billings</h2>
        <div class="component__checkoutbillings_first">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6">
                    <label for="firstname">First name <span>*</span></label>
                    <input
                            type="text"
                            id="firstname"
                            name="firstname"
                            v-validate="'required'"
                            v-model="firstName"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('firstname')"
                    >
                    {{ errors.first('firstname') }}
                </span>
                </div>
                <div class="cell small-12 medium-6">
                    <label for="lastname">Last name <span>*</span></label>
                    <input
                            type="text"
                            id="lastname"
                            name="lastname"
                            v-validate="'required'"
                            v-model="lastName"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('lastname')"
                    >
                    {{ errors.first('lastname') }}
                </span>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="companyname">Company name</label>
                    <input
                            type="text"
                            id="companyname"
                            name="companyname"
                            v-validate=""
                            v-model="companyName"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('companyname')"
                    >
                    {{ errors.first('companyname') }}
                </span>
                </div>
            </div>
            <template v-if="checkout.shipping === 'standardShipping'">
                <div class="grid-x grid-margin-x">
                    <div class="cell">
                        <label for="country">Country <span>*</span></label>
                        <input
                                type="text"
                                id="country"
                                name="country"
                                v-validate="'required'"
                                v-model="country"
                        >
                        <span
                                class="form__error"
                                v-show="errors.has('country')"
                        >
                    {{ errors.first('country') }}
                </span>
                    </div>
                </div>
                <div class="grid-x grid-margin-x">
                    <div class="cell">
                        <label for="streetaddressfirst">Street address <span>*</span></label>
                        <input
                                type="text"
                                id="streetaddressfirst"
                                name="streetaddressfirst"
                                v-validate="'required'"
                                placeholder="House number and street name"
                                v-model="streetAddressFirst"
                        >
                        <span
                                class="form__error"
                                v-show="errors.has('streetaddressfirst')"
                        >
                    {{ errors.first('streetaddressfirst') }}
                </span>
                        <input
                                type="text"
                                id="streetaddresssecond"
                                name="streetaddresssecond"
                                placeholder="Apartment, suite, unit etc. (optional)"
                                v-model="streetAddressSecond"
                        >
                    </div>
                </div>
                <div class="grid-x grid-margin-x">
                    <div class="cell">
                        <label for="postcode">Postcode / ZIP <span>*</span></label>
                        <input
                                type="text"
                                id="postcode"
                                name="postcode"
                                v-validate="'digits:5|required'"
                                v-model="postcode"
                        >
                        <span
                                class="form__error"
                                v-show="errors.has('postcode')"
                        >
                    {{ errors.first('postcode') }}
                </span>
                    </div>
                </div>
                <div class="grid-x grid-margin-x">
                    <div class="cell">
                        <label for="city">City / Town <span>*</span></label>
                        <input
                                type="text"
                                id="city"
                                name="city"
                                v-validate="'required'"
                                v-model="city"
                        >
                        <span
                                class="form__error"
                                v-show="errors.has('city')"
                        >
                    {{ errors.first('city') }}
                </span>
                    </div>
                </div>
            </template>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="phone">Phone <span>*</span></label>
                    <input
                            type="text"
                            id="phone"
                            name="phone"
                            v-validate="'numeric|required'"
                            v-model="phone"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('phone')"
                    >
                    {{ errors.first('phone') }}
                </span>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="email">Email address <span>*</span></label>
                    <input
                            type="email"
                            id="email"
                            name="email"
                            v-validate="'email|required'"
                            v-model="email"
                    >
                    <span
                            class="form__error"
                            v-show="errors.has('email')"
                    >
                    {{ errors.first('email') }}
                </span>
                </div>
            </div>
        </div>
        <template v-if="checkout.shipping === 'standardShipping'">
            <div class="component__checkoutbillings_second">
                <label for="secondaddress">
                    <input type="checkbox" id="secondaddress" v-model="shipToDifferent">
                    <span>Ship to different address?</span>
                </label>
                <template v-if="shipToDifferent">
                    <br>
                    <div class="grid-x grid-margin-x">
                        <div class="cell small-12 medium-6">
                            <label for="firstnamesecond">First name <span>*</span></label>
                            <input
                                    type="text"
                                    id="firstnamesecond"
                                    name="firstnamesecond"
                                    v-validate="'required'"
                                    v-model="firstNameSecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('firstnamesecond')"
                            >
                    {{ errors.first('firstnamesecond') }}
                </span>
                        </div>
                        <div class="cell small-12 medium-6">
                            <label for="lastname">Last name <span>*</span></label>
                            <input
                                    type="text"
                                    id="lastnamesecond"
                                    name="lastnamesecond"
                                    v-validate="'required'"
                                    v-model="lastNameSecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('lastname')"
                            >
                    {{ errors.first('lastnamesecond') }}
                </span>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <label for="companynamesecond">Company name</label>
                            <input
                                    type="text"
                                    id="companynamesecond"
                                    name="companynamesecond"
                                    v-validate=""
                                    v-model="companyNameSecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('companynamesecond')"
                            >
                    {{ errors.first('companynamesecond') }}
                </span>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <label for="countrysecond">Country <span>*</span></label>
                            <input
                                    type="text"
                                    id="countrysecond"
                                    name="countrysecond"
                                    v-validate="'required'"
                                    v-model="countrySecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('countrysecond')"
                            >
                    {{ errors.first('countrysecond') }}
                </span>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <label for="streetaddressfirstsecond">Street address <span>*</span></label>
                            <input
                                    type="text"
                                    id="streetaddressfirstsecond"
                                    name="streetaddressfirstsecond"
                                    v-validate="'required'"
                                    placeholder="House number and street name"
                                    v-model="streetAddressFirstSecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('streetaddressfirstsecond')"
                            >
                    {{ errors.first('streetaddressfirstsecond') }}
                </span>
                            <input
                                    type="text"
                                    id="streetaddresssecondsecond"
                                    name="streetaddresssecondsecond"
                                    placeholder="Apartment, suite, unit etc. (optional)"
                                    v-model="streetAddressSecondSecond"
                            >
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <label for="postcodesecond">Postcode / ZIP <span>*</span></label>
                            <input
                                    type="text"
                                    id="postcodesecond"
                                    name="postcodesecond"
                                    v-validate="'digits:5|required'"
                                    v-model="postcodeSecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('postcodesecond')"
                            >
                    {{ errors.first('postcodesecond') }}
                </span>
                        </div>
                    </div>
                    <div class="grid-x grid-margin-x">
                        <div class="cell">
                            <label for="citysecond">City / Town <span>*</span></label>
                            <input
                                    type="text"
                                    id="citysecond"
                                    name="citysecond"
                                    v-validate="'required'"
                                    v-model="citySecond"
                            >
                            <span
                                    class="form__error"
                                    v-show="errors.has('citysecond')"
                            >
                    {{ errors.first('citysecond') }}
                </span>
                        </div>
                    </div>
                </template>
            </div>
        </template>
        <div class="component__checkoutbillings_notes">
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <label for="notes">Order notes (optional)</label>
                    <textarea
                            id="notes"
                            name="notes"
                            placeholder="Notes about your order, e.g. special notes for delivery."
                            v-model="notes"
                    ></textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import {mapFields} from 'vuex-map-fields'

    export default {
        name: 'component-checkoutbillings',
        computed: {
            ...mapState(['checkout']),
            ...mapFields([
                'checkout.firstName',
                'checkout.lastName',
                'checkout.companyName',
                'checkout.phone',
                'checkout.email',
                'checkout.country',
                'checkout.streetAddressFirst',
                'checkout.streetAddressSecond',
                'checkout.postcode',
                'checkout.city',
                'checkout.shipToDifferent',
                'checkout.firstNameSecond',
                'checkout.lastNameSecond',
                'checkout.companyNameSecond',
                'checkout.countrySecond',
                'checkout.streetAddressFirstSecond',
                'checkout.streetAddressSecondSecond',
                'checkout.postcodeSecond',
                'checkout.citySecond',
                'checkout.notes'
            ])
        },
        inject: ['$validator'],
    }
</script>

<style lang="scss">
    @import './../styles/components/checkoutbillings';
</style>