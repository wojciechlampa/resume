<template>
    <div class="component__postcontent">
        <div v-for="post in posts">
            <h1 class="component__postcontent_title" v-if="post.slug === route">{{post.title.rendered}}</h1>
            <div class="component__postcontent_content" v-if="post.slug === route" v-html="post.content.rendered"></div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

	export default {
		name: 'component-postcontent',
        data: function () {
            return {
            	route: this.$route.params.slug
            }
		},
        watch: {
			$route(from, to) {
				this.route = this.$route.params.slug
            }
        },
		computed: {
			...mapState([
				'posts'
			])
		}
	}
</script>

<style lang="scss">
    @import "../styles/components/postcontent";
</style>