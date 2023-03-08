<template>
    <div class="page__product">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-6">
                    <component-productgallery
                            v-bind:thumbnail="product.thumbnail"
                            v-bind:gallery="product.gallery"
                    />
                </div>
                <div class="cell small-12 medium-6">
                    <component-productdetails
                            v-bind:name="product.name"
                            v-bind:price="product.price"
                            v-bind:description="product.description"
                            v-bind:series="product.series"
                    />
                    <component-productaddtocart
                            v-bind:product="product"
                    />
                </div>
            </div>
            <div class="grid-x">
                <div class="cell">
                    <component-productreviews
                            v-bind:reviews="product.reviews"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ComponentProductgallery from "../components/ProductGallery";
    import ComponentProductreviews from "../components/ProductReviews";
    import ComponentProductdetails from "../components/ProductDetails";
    import ComponentProductaddtocart from "../components/ProductAddtocart";

    export default {
        components: {
            ComponentProductaddtocart,
            ComponentProductdetails,
            ComponentProductreviews,
            ComponentProductgallery
        },
        name: 'views-product',
        data: function () {
            return {}
        },
        computed: {
            product: function () {
                return this.$store.getters.productById(this.$route.params['id'])
            }
        }
    }
</script>

<style lang="scss">
    @import './../styles/views/product';
</style>