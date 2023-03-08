<template>
    <div class="component__carttotals" v-bind:cartcount="cart.totalCount">
        <div class="grid-y">
            <div class="cell">
                <div class="component__carttotals_title">
                    Cart totals
                </div>
            </div>
            <div class="cell">
                <div class="component__carttotals_label">
                    Subtotal
                </div>
                <div class="component__carttotals_total">
                    {{cartTotal() | price}}
                </div>
            </div>
            <div class="cell">
                <router-link
                        class="component__carttotals_actions_checkout btn btn--normal btn--black"
                        type="button"
                        v-bind:to="{name: 'checkout'}"
                >
                    Checkout
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: 'component-carttotals',
        computed: {
            ...mapState(['cart'])
        }
    }
</script>

<style lang="scss">
    @import './../styles/components/carttotals';
</style>