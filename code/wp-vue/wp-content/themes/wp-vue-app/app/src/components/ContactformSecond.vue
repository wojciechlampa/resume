<template>
    <div class="component__contactform_form_second">
        <div class="component__contactform_form_return">
            <button v-on:click="goBack" type="button"
                    class="component__contactform_form_return_button btn btn--text btn--back btn--light-blue">
                <font-awesome-icon icon="angle-left"/>
                Go back
            </button>
        </div>
        <template v-if="!form.insuredDetails && form.insured">
            <component-contactformsecondinfields></component-contactformsecondinfields>
        </template>
        <template v-else>
            <component-contactformsecondfields></component-contactformsecondfields>
        </template>
    </div>
</template>

<script>
	import {mapState} from 'vuex';
	import ComponentContactformsecondinfields from "./ContactformSecondInfields";
	import ComponentContactformsecondfields from "./ContactformSecondFields";

	export default {
		components: {
			ComponentContactformsecondfields,
			ComponentContactformsecondinfields},
		data: function () {
			return {
			}
		},
		methods: {
			goBack: function () {
				if (this.form.insuredDetails) {
					this.$store.dispatch('switchStepSecondInsured', false);
				} else {
					this.$store.dispatch('switchStepFirst', true);
					this.$store.dispatch('switchStepSecond', false);
				}
			}
		},
		name: 'component-contactformsecond',
		computed: {
			...mapState([
				'form',
				'formBody'
			])
		}
	}
</script>

<style lang="scss">

</style>