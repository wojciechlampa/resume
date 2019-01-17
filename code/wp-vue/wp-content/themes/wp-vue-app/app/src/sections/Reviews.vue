<template>
    <section class="section__reviews">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell text-center">
                    <h2 class="section__reviews_title">What <strong>our customers</strong> are saying</h2>
                </div>
            </div>
            <component-review></component-review>
        </div>
    </section>
</template>

<script>
	import ComponentReview from "../components/Review";

	export default {
		components: {
			ComponentReview
		},
		name: 'section-reviews'
	}
</script>

<style lang="scss">
    @import '../styles/components/reviews';
</style>
