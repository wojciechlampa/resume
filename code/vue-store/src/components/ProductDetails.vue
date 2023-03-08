<template>
    <div class="component__product_details">
        <div class="component__product_details_series">
            {{series | toUppercase}}
        </div>
        <h1 class="component__product_details_title">
            {{name}}
        </h1>
        <div class="component__product_details_price">
            {{price | price}}
        </div>
        <div class="component__product_details_descripion">
            {{description}}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'component-productdetails',
        props: [
            'name',
            'price',
            'series',
            'description'
        ]
    }
</script>

<style lang="scss">
    @import './../styles/components/productdetails';
</style>