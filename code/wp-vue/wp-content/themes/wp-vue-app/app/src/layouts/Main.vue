<template>
    <div id="app" class="app">
        <div class="grid-y full-height">
            <div class="app__cellheader cell">
                <layout-header></layout-header>
            </div>
            <div class="app__cellmain cell">
                <page-home></page-home>
            </div>
            <div class="app__cellfooter cell">
                <layout-footer></layout-footer>
            </div>
        </div>
    </div>
</template>

<script>
	import layoutHeader from './Header.vue';
	import layoutFooter from './Footer.vue';
	import pageHome from './../pages/Home.vue'

	export default {
		name: "main-layout",
		components: {
			layoutHeader,
			layoutFooter,
			pageHome
		}
	}
</script>

<style lang="scss">
    @import "../styles/app";
</style>