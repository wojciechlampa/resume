<template>
    <div class="page__shop">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-3">
                    <aside-sidebar/>
                </div>
                <div class="cell small-12 medium-9">
                    <section-catalog v-bind:products="products"/>
                    <div class="reduce-margin"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    import SectionCatalog from "../sections/Catalog";
    import AsideSidebar from "../asides/Sidebar";

    export default {
        components: {
            AsideSidebar,
            SectionCatalog,
        },
        name: 'views-products',
        created() {
            this.$store.dispatch('clearFilters');
        },
        computed: {
            ...mapState([
                'filters'
            ]),
            products: function () {
                return this.$store.getters.productsByType(this.$route.params['slug'])
                    .filter((item) => {
                        return (item.name.toLowerCase().includes(this.filters.keyword.toLowerCase())
                            && (this.filters.series.length === 0 || this.filters.series.includes(item.series))
                            && (this.filters.strip.length === 0 || this.filters.strip.includes(item.strip)))
                    })
            }
        }
    }
</script>

<style lang="scss">
    @import "./../styles/views/shop";
</style>