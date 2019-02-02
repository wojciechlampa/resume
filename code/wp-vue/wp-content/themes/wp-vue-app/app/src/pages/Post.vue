<template>
    <main class="page__articles">
        <div class="grid-container">
            <div class="grid-x">
                <div class="column small-12 medium-4 page__articles_cellsidebar">
                    <component-postsidebar></component-postsidebar>
                </div>
                <div class="column small-12 medium-7 medium-offset-1 page__articles_cellcontent">
                    <component-postcontent></component-postcontent>
                    <button type="button" v-on:click="goBack" class="page__articles_button btn btn--normal btn--light-blue">Go back</button>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
	import ComponentPostsidebar from "../components/PostSidebar";
	import ComponentPostcontent from "../components/PostContent";

	export default {
		name: 'page-post',
		components: {
			ComponentPostcontent,
			ComponentPostsidebar
		},
		methods: {
			goBack () {
				window.history.length > 1
					? this.$router.go(-1)
					: this.$router.push('/')
			}
		}
	}
</script>

<style lang="scss">

</style>
