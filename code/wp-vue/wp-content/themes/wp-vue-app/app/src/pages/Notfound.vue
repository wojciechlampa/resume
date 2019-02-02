<template>
    <main class="page__notfound">
        <div class="grid-container">
            <div class="grid-x">
                <div class="column small-12 medium-6 page__notfound_celltext align-self-middle">
                    <h1 class="page__notfound_title">
                        <span>404</span>
                        page not found
                    </h1>
                    <p class="page__notfound_text">Looks like the page you were looking for doesn't exist.
                        Click the button below to return home.</p>
                    <router-link v-bind:to="{ name: 'home' }" class="btn btn--normal btn--light-blue">Go to homepage</router-link>
                </div>
                <div class="column small-12 medium-6 page__notfound_cellmascot">
                    <component-mascot></component-mascot>
                </div>
            </div>
        </div>
    </main>
</template>

<script>

	import ComponentMascot from "../components/Mascot";

	export default {
		name: 'page-notfound',
		components: {
			ComponentMascot
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/notfound';
</style>
