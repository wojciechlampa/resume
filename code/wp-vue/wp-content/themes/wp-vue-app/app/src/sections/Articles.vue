<template>
    <section class="section__articles">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 section__articles_celltitle">
                    <h2 class="section__articles_title text-center">Recent news in <strong>Hurricane Insurance</strong></h2>
                </div>
                <div class="cell small-12 medium-12 large-10 large-offset-1 section__articles_cellarticles">
                    <component-article></component-article>
                </div>
                <div class="cell small-12 section__articles_cellbutton text-center">
                    <a href="" class="section__articles_button btn btn--normal btn--light-blue">Read more articles</a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
	import ComponentArticle from "../components/Article";

		export default {
			components: {ComponentArticle},
			name: 'section-articles'
	}
</script>

<style lang="scss">
    @import '../styles/components/articles';
</style>
