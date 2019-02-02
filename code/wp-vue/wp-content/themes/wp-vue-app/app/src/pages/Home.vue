<template>
    <main class="page__home">
        <section-hero></section-hero>
        <section-reviews></section-reviews>
        <page-articles v-bind:location="location"></page-articles>
    </main>
</template>

<script>
	import sectionHero from './../sections/Hero'
	import sectionReviews from './../sections/Reviews'
	import PageArticles from "./Articles";

	export default {
		name: 'page-home',
		metaInfo: {
			title: 'Cheapest Hurricane Insurance In Hawaii',
            meta: [
				{
					name: 'description',
					content: 'Work with Hawaii local brokers to help find you the cheapest hurricane insurance in Hawaii. We are often times 5%-10% cheaper than our competitors.'
				}
            ]
		},
        data: function () {
            return {
            	location: 'home'
            }
		},
		components: {
			PageArticles,
			sectionHero,
			sectionReviews
		}
	}
</script>

<style lang="scss">

</style>
