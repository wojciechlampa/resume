<template>
    <div class="cell small-12 medium-12 large-4 component__reviewcell">
        <div class="component__review">
            <div class="grid-x full-height">
                <div class="cell align-self-bottom">
                    <div class="component__review_quote" v-html="review.content.rendered"></div>
                    <div class="component__review_rating">
                        <font-awesome-icon icon="star" v-for="index in Number(review.acf.rating)" v-bind:key="index"/>
                    </div>
                    <div class="component__review_author">
                        <div class="component__review_author_name">
                            {{review.acf.author}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default {
		name: 'component-review',
		data: function () {
			return {
				starRepeat: 0
			}
		},
		props: ['review']
	}
</script>

<style lang="scss">
</style>
