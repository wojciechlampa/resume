<template>
    <main class="page__home">
        <section-hero></section-hero>
        <section-reviews></section-reviews>
        <section-articles></section-articles>
    </main>
</template>

<script>
	import sectionHero from './../sections/Hero.vue'
	import sectionReviews from './../sections/Reviews.vue'
	import SectionArticles from "../sections/Articles";

	export default {
		name: 'page-home',
		components: {
			sectionHero,
			sectionReviews,
			SectionArticles
		}
	}
</script>

<style lang="scss">

</style>
