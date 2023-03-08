import Vue from 'vue'
import Vuex from 'vuex'

import {products} from './data'
import {getField, updateField} from 'vuex-map-fields'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        products: products,
        filters: {
            keyword: '',
            series: [],
            strip: []
        },
        cart: {
            products: {},
            totalCount: 0
        },
        checkout: {
            firstName: '',
            lastName: '',
            companyName: '',
            phone: '',
            email: '',
            country: '',
            streetAddressFirst: '',
            streetAddressSecond: '',
            postcode: '',
            city: '',
            shipToDifferent: false,
            firstNameSecond: '',
            lastNameSecond: '',
            companyNameSecond: '',
            countrySecond: '',
            streetAddressFirstSecond: '',
            streetAddressSecondSecond: '',
            postcodeSecond: '',
            citySecond: '',
            notes: '',
            shipping: '',
            payment: '',
            paymentDetails: {
                cardNumber: '',
                cardHolder: '',
                cardExpiracy: '',
                cardCVV: ''
            },
            products: {}
        }
    },
    getters: {
        getField,
        productById: (state) => id => {
            return state.products.filter(p => p.id === id)[0]
        },
        productsByType: (state) => type => {
            return state.products.filter(p => p.type === type)
        },
        getCartCount: state => {
            return state.cart.totalCount;
        },
        getCart: (state) => {
            return state.cart.products
        }
    },
    mutations: {
        updateField,
        UPDATE_CHECKOUT_PRODUCTS(state, value) {
            state.checkout.products = value;
        },
        CLEAR_FILTERS(state) {
            state.filters.keyword = '';
            state.filters.series = [];
            state.filters.strip = [];
        },
        CLEAR_CART(state) {
            state.cart.products = {};
            state.cart.totalCount = 0
        },
        UPDATE_FILTER_KEYWORD(state, val) {
            state.filters.keyword = val
        },
        UPDATE_FILTER_SERIES(state, val) {
            if (state.filters.series.indexOf(val) === -1) {
                state.filters.series.push(val);
            } else {
                state.filters.series.splice(state.filters.series.indexOf(val), 1);
            }
        },
        UPDATE_FILTER_STRIP(state, val) {
            if (state.filters.strip.indexOf(val) === -1) {
                state.filters.strip.push(val);
            } else {
                state.filters.strip.splice(state.filters.strip.indexOf(val), 1);
            }
        },
        ADD_TO_CART(state, item) {
            const products = state.cart.products;
            let cart = state.cart;

            if (products.hasOwnProperty(item.id)) {
                products[item.id].count++
            } else {
                products[item.id] = item;
                products[item.id].count = 1
            }

            cart.totalCount++
        },
        REMOVE_FROM_CART(state, item) {
            const products = state.cart.products;
            let cart = state.cart;

            if (products.hasOwnProperty(item.id)) {
                if (products[item.id].count > 1) {
                    products[item.id].count--;
                    cart.totalCount--
                } else {
                    delete products[item.id];
                    cart.totalCount--
                }
            }
        }
    },
    actions: {
        clearFilters(context) {
            context.commit('CLEAR_FILTERS')
        },
        clearCart(context) {
            context.commit('CLEAR_CART')
        },
        updateFilterKeyword(context, value) {
            context.commit('UPDATE_FILTER_KEYWORD', value)
        },
        updateFilterSeries(context, value) {
            context.commit('UPDATE_FILTER_SERIES', value)
        },
        updateFilterStrip(context, value) {
            context.commit('UPDATE_FILTER_STRIP', value)
        },
        updateCheckoutProducts(context, value) {
            context.commit('UPDATE_CHECKOUT_PRODUCTS', value)
        },
        addToCart(context, item) {
            context.commit('ADD_TO_CART', item)
        },
        removeFromCart(context, item) {
            context.commit('REMOVE_FROM_CART', item)
        }
    }
})
