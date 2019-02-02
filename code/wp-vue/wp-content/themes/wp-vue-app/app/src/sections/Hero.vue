<template>
    <section class="section__hero">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 medium-5 section__hero_cellform">
                    <component-contactform></component-contactform>
                </div>
                <div class="cell small-12 medium-6 medium-offset-1 section__hero_cellmascot">
                    <div class="component__mascot">
                        <div class="component__mascot_pig">
                            <div class="component__mascot_pig_bubble">
                                Where can I find affordable <br>
                                <strong>Hurricane insurance</strong> for my home?
                            </div>
                            <component-mascot></component-mascot>
                        </div>
                        <div class="component__mascot_islands">
                            <component-islands></component-islands>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
	import ComponentContactform from "../components/Contactform";
	import ComponentMascot from "../components/Mascot";
	import ComponentIslands from "../components/Islands";

	export default {
		name: 'section-hero',
		components: {
			ComponentIslands,
			ComponentMascot,
			ComponentContactform
		}
	}
</script>

<style lang="scss">
    @import '../styles/components/hero';
    @import '../styles/components/mascot';
</style>
