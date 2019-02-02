<template>
    <main class="page__articles">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 page__articles_celltitle">
                    <h2 class="page__articles_title text-center">Recent news in <strong>Hurricane Insurance</strong></h2>
                </div>
                <div class="cell small-12 medium-12 large-10 large-offset-1 page__articles_cellarticles">
                    <div class="grid-x grid-margin-x">
                        <component-article v-for="(post, index) in posts" v-bind:key="post.id" v-bind:post="post" v-if="(location === 'home' ? index < 4 : post)"></component-article>
                    </div>
                </div>
                <div class="cell small-12 page__articles_cellbutton text-center">
                    <template v-if="location === 'home'">
                        <router-link to="/articles" class="section__articles_button btn btn--normal btn--light-blue">Read more articles</router-link>
                    </template>
                    <template v-else>
                        <router-link to="/" class="page__articles_button btn btn--normal btn--light-blue">Go back to home</router-link>
                    </template>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
	import ComponentArticle from "../components/Article";
	import {mapState} from 'vuex'

	export default {
		name: 'page-articles',
        props: ['location'],
		components: {
			ComponentArticle
		},
        computed: {
            ...mapState([
            	'posts'
            ])
        }
	}
</script>

<style lang="scss">
    @import "../styles/components/articles";
</style>
