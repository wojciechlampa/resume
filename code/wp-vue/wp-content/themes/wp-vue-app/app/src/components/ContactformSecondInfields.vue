<template>
            <div class="component__contactform_form_second_insured">
                <div class="component__contactform_form_toplabel">
                    Fill in current insurance carrier here:
                </div>
                <div class="grid-x grid-padding-x">
                    <div class="cell small-12 component__contactform_cellinput">
                        <label for="insurance-carrier">Current insurance carrier</label>
                        <input
                                type="text"
                                id="insurance-carrier"
                                name="insurance-carrier"
                                placeholder="If you don't know just leave it blank"
                                v-model="formBody.currentInsuranceCarrier"
                                v-validate="'alpha_spaces|min:2'"
                                data-vv-as="current insurance carrier"
                                :class="{ 'error': errors.has('insurance-carrier') }"
                        >
                        <span v-show="errors.has('insurance-carrier')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('insurance-carrier') }}</span>
                    </div>
                    <div class="cell small-12 component__contactform_cellinput">
                        <label for="policy-started">Date policy started</label>
                        <input
                                type="text"
                                id="policy-started"
                                name="policy-started"
                                placeholder="if you don't know, just click next"
                                v-model="formBody.datePolicyStarted"
                                v-validate="'date_format:DD/MM/YYYY'"
                                v-mask="'##/##/####'"
                                data-vv-as="date policy started"
                                :class="{ 'error': errors.has('policy-started') }"
                        >
                        <span v-show="errors.has('policy-started')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('policy-started') }}</span>
                    </div>
                </div>
                <button v-on:click="goDetails"
                        class="component__contactform_form_second_next btn btn--normal btn--light-blue"
                        type="button">Next
                </button>
            </div>
</template>

<script>
	import {mapState} from 'vuex';

	export default {
		data: function () {
			return {
			}
		},
		methods: {
			goDetails: function () {
				this.$validator.validateAll().then((result) => {
					if (result) {
						this.$store.dispatch('switchStepSecondInsured', true);
					}
				});
			}
		},
		name: 'component-contactformsecondinfields',
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