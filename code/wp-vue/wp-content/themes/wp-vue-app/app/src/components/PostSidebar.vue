<template>
    <div class="component__postsidebar">
        <div class="component__postsidebar_title">All articles</div>
        <ul class="component__postsidebar_list">
            <li class="component__postsidebar_list_item" v-for="post in posts">
                <router-link v-bind:to="{ name: 'post', params: {slug: post.slug} }">
                    {{post.title.rendered}}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

	export default {
		name: 'component-postsidebar',
		computed: {
			...mapState([
				'posts'
			])
		}
	}
</script>

<style lang="scss">
    @import "../styles/components/postsidebar";
</style>