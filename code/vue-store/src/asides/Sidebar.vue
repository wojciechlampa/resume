<template>
    <aside class="aside__sidebar">
        <div class="aside__sidebar_title">
            Filter
        </div>
        <component-filtersearch/>
        <component-filterseries/>
        <component-filterstrip/>
    </aside>
</template>

<script>
    import {mapState} from 'vuex';
    import ComponentFiltersearch from "../components/FilterSearch";
    import ComponentFilterseries from "../components/FilterSeries";
    import ComponentFilterstrip from "../components/FilterStrip";

    export default {
        components: {
            ComponentFilterstrip,
            ComponentFilterseries,
            ComponentFiltersearch},
        computed: {
            ...mapState([
                'filters'
            ])
        },
        name: 'aside-sidebar'
    }
</script>

<style lang="scss">
    @import "../styles/asides/sidebar";
    @import "../styles/components/filter";
</style>