<template>
    <div id="app" class="app">
        <div class="grid-y full-height">
            <div class="app__cellheader cell">
                <layout-header></layout-header>
            </div>
            <div class="app__cellmain cell">
                <transition name="fade" mode="out-in">
                    <router-view></router-view>
                </transition>
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
		data () {
			return {
				transitionName: 'slide-left'
			}
		},
		components: {
			layoutHeader,
			layoutFooter
		},
		beforeRouteUpdate (to, from, next) {
			const toDepth = to.path.split('/').length
			const fromDepth = from.path.split('/').length
			this.transitionName = toDepth < fromDepth ? 'slide-right' : 'slide-left'
			next()
		},
	}
</script>

<style lang="scss">
    @import "../styles/app";

    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.3s
    }

    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>