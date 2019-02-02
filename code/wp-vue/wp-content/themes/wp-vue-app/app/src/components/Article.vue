<template>
    <div class="cell small-12 medium-12 large-6 component__article_cell">
        <router-link v-bind:to="{ name: 'post', params: {slug: post.slug} }" class="component__article">
            <div class="component__article_arrow">
                <font-awesome-icon icon="angle-right"/>
            </div>
            <div class="component__article_title">
                {{post.title.rendered}}
            </div>
            <div class="component__article_readmore">
                Read more
            </div>
        </router-link>
    </div>
</template>

<script>
	export default {
		data: function () {
			return {}
		},
		props: ['post'],
		name: 'component-article',
	}
</script>

<style lang="scss">
</style>
