<template>
    <main class="page__thankyou">
        <div class="grid-container">
            <div class="grid-x">
                <div class="column small-12 medium-6 page__thankyou_celltext align-self-middle">
                    <h1 class="page__thankyou_title">Mahalo!</h1>
                    <p class="page__thankyou_text">Thank you so much for contacting us. We will be with you shortly.
                        Click the button below to return home.</p>
                    <router-link v-bind:to="{ name: 'home' }" class="btn btn--normal btn--light-blue">Go to homepage</router-link>
                </div>
                <div class="column small-12 medium-6 page__thankyou_cellmascot">
                    <component-mascot></component-mascot>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
	import ComponentMascot from "../components/Mascot";

	export default {
		name: 'page-thankyou',
		components: {
			ComponentMascot
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/thankyou';
</style>
