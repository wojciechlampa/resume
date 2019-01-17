<template>
    <div class="grid-x grid-margin-x">

        <div class="cell small-12 medium-12 large-4 component__reviewcell" v-for="index in 3" :key="index">
            <div class="component__review">
                <div class="component__review_quote">
                    “Thanks for working with us. We are pleased with your quote and our coverage.”
                </div>
                <div class="component__review_rating">
                    <font-awesome-icon icon="star" v-for="index in 5" :key="index"/>
                </div>
                <div class="component__review_author">
                    <div class="component__review_author_name">
                        Pastor Verne Nakasone
                    </div>
                    <div class="component__review_author_location">
                        Lincoln, CA
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
	export default {
		data: function () {
			return {}
		},
		name: 'component-review',
	}
</script>

<style lang="scss">
</style>
