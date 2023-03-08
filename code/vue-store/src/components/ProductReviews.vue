<template>
    <div class="component__product_reviews">
        <h2 class="component__product_reviews_title">Reviews</h2>
        <template v-if="reviews.length > 0">
            <ul>
                <li v-for="(review, index) in reviews" v-bind:key="`${index}-${review.authorName}`">
                    <div class="component__product_reviews_author">
                        {{review.authorName}}
                    </div>
                    <div class="component__product_reviews_text">
                        {{review.quote}}
                    </div>
                </li>
            </ul>
        </template>
        <template v-else>
            <div class="component__product_reviews_notify">
                This product doesn't have any reviews yet.
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        name: 'component-productreviews',
        props: [
            'reviews'
        ]
    }
</script>

<style lang="scss">
    @import './../styles/components/productreviews';
</style>