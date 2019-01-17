<template>
    <section class="section__hero">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 medium-5 section__hero_cellform">
                    <component-contactform></component-contactform>
                </div>
                <div class="cell small-12 medium-6 medium-offset-1 section__hero_cellform">
                    <component-mascot></component-mascot>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
	import ComponentContactform from "../components/Contactform";
	import ComponentMascot from "../components/Mascot";

	export default {
		name: 'section-hero',
		components: {
			ComponentMascot,
			ComponentContactform
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/hero';
</style>
