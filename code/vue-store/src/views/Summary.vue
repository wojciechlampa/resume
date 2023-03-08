<template>
    <div class="page__summary">
        <div class="grid-container">
            <div class="grid-x align-center">
                <div class="cell small-12 medium-8">
                    <div class="page__summary_title">
                        <h1>Order summary</h1>
                    </div>
                    <div class="page__summary_text">
                        Thank you, we've received your order.
                    </div>
                    <div class="page__summary_details">
                        <h2>Billing details:</h2>
                        <table>
                            <tbody>
                            <tr>
                                <td>Payment method:</td>
                                <td>{{checkout.payment | camelToString}}</td>
                            </tr>
                            <tr>
                                <td>Delivery option:</td>
                                <td>{{checkout.shipping | camelToString}}</td>
                            </tr>
                            <tr>
                                <td>First name:</td>
                                <td>{{checkout.firstName}}</td>
                            </tr>
                            <tr>
                                <td>First name:</td>
                                <td>{{checkout.firstName}}</td>
                            </tr>
                            <tr>
                                <td>Last name:</td>
                                <td>{{checkout.lastName}}</td>
                            </tr>
                            <tr>
                                <td>Company name:</td>
                                <td>{{checkout.companyName}}</td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>{{checkout.phone}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>{{checkout.email}}</td>
                            </tr>
                            <tr>
                                <td>Country:</td>
                                <td>{{checkout.country}}</td>
                            </tr>
                            <tr>
                                <td>Street address:</td>
                                <td>{{checkout.streetAddressFirst}} <br>{{checkout.streetAddressSecond}}</td>
                            </tr>
                            <tr>
                                <td>Postcode:</td>
                                <td>{{checkout.postcode}}</td>
                            </tr>
                            <tr>
                                <td>City:</td>
                                <td>{{checkout.city}}</td>
                            </tr>
                            </tbody>
                        </table>
                        <template v-if="checkout.shipToDifferent">
                            <h2>Ship to:</h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td>First name:</td>
                                    <td>{{checkout.firstNameSecond}}</td>
                                </tr>
                                <tr>
                                    <td>Last name:</td>
                                    <td>{{checkout.lastNameSecond}}</td>
                                </tr>
                                <tr>
                                    <td>Company name:</td>
                                    <td>{{checkout.companyNameSecond}}</td>
                                </tr>
                                <tr>
                                    <td>Country:</td>
                                    <td>{{checkout.countrySecond}}</td>
                                </tr>
                                <tr>
                                    <td>Street address:</td>
                                    <td>{{checkout.streetAddressFirstSecond}} <br>{{checkout.streetAddressSecondSecond}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postcode:</td>
                                    <td>{{checkout.postcodeSecond}}</td>
                                </tr>
                                <tr>
                                    <td>City:</td>
                                    <td>{{checkout.citySecond}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </template>
                    </div>
                    <div class="page__summary_products">
                        <h2>Products:</h2>
                        <ul>
                            <li v-for="(product, index) in checkout.products" v-bind:key="index">
                                <img
                                        class="component__minicart_box_products_single_image"
                                        v-bind:src="require(`@/assets/${product.thumbnail}`)"
                                        v-bind:alt="product.name">
                                {{product.name}}
                                <span>{{product.count}}</span>
                                <span> x </span>
                                <span>{{product.price | price}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="page__summary_notes">
                        <h2>Notes:</h2>
                        {{checkout.notes}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'views-summary',
        computed: {
            ...mapState(['checkout'])
        }
    }
</script>

<style lang="scss">
    @import './../styles/views/summary';
</style>