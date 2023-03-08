<template>
    <div class="component__filter component__filter--strip">
        <div class="component__filter_title">
            by strip:
        </div>
        <ul>
            <li v-for="(singleStrip, index) in getStrip" v-bind:key="index">
                <label v-bind:for="'filtersingleStrip-' + singleStrip.strip">
                    <input
                            name="filterstrip"
                            type="checkbox"
                            v-bind:value="singleStrip.strip"
                            v-bind:id="'filtersingleStrip-' + singleStrip.strip"
                            v-on:click="updateFilterStrip(singleStrip.strip)"
                    >
                    <span>{{singleStrip.strip}}</span>
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'component-filterstrip',
        computed: {
            getStrip: function () {
                const products = this.$store.getters.productsByType(this.$route.params['slug']);
                let strip;

                strip = products.filter((elem, index, self) => self.findIndex(
                    (key) => {
                        return (key.strip === elem.strip)
                    }) === index);

                return strip;
            }
        },
        methods: {
            updateFilterStrip: function (value) {
                this.$store.dispatch('updateFilterStrip', value)
            }
        }
    }
</script>

<style lang="scss">

</style>