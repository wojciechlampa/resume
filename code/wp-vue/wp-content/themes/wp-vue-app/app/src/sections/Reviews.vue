<template>
    <section class="section__reviews">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell text-center">
                    <h2 class="section__reviews_title">What <strong>our customers</strong> are saying</h2>
                </div>
            </div>
            <div class="grid-x grid-margin-x">
                <component-review v-for="(review, index) in reviews" v-bind:key="review.id" v-bind:review="review"></component-review>
            </div>
        </div>
    </section>
</template>

<script>
    import {mapState} from 'vuex'
    import axios from 'axios'
	import ComponentReview from "../components/Review";

	export default {
		components: {
			ComponentReview
		},
        computed: {
            ...mapState([
            	'reviews'
            ])
        },
		created() {
			this.loadReviews();
		},
		name: 'section-reviews',
		methods: {
			loadReviews: function () {
				axios
					.get('/wp-json/wp/v2/review')
					.then(r => r.data)
					.then((response) => {
						this.$store.dispatch('pushReviews', response);
					});
			}
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/reviews';
</style>
