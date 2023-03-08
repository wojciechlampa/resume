<template>
    <div class="component__filter component__filter--series">
        <div class="component__filter_title">
            by series:
        </div>
        <ul>
            <li v-for="(singleSeries, index) in getSeries" v-bind:key="index">
                <label v-bind:for="'filtersingleSeries-' + singleSeries.series">
                    <input
                            name="filterseries"
                            type="checkbox"
                            v-bind:value="singleSeries.series"
                            v-bind:id="'filtersingleSeries-' + singleSeries.series"
                            v-on:click="updateFilterSeries(singleSeries.series)"
                    >
                    <span>{{singleSeries.series}}</span>
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: 'component-filterseries',
        computed: {
            getSeries: function () {
                const products = this.$store.getters.productsByType(this.$route.params['slug']);
                let series;

                series = products.filter((elem, index, self) => self.findIndex(
                    (key) => {return (key.series === elem.series)}) === index);

                return series;

            }
        },
        methods: {
            updateFilterSeries: function (value) {
                this.$store.dispatch('updateFilterSeries', value);
            }
        }
    }
</script>

<style lang="scss">

</style>