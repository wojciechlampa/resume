<template>
    <div class="component__contactform_form_first">
        <div class="component__contactform_form_toplabel">
            <strong>Do you currently have Hurricane insurance?</strong>
        </div>
        <div class="grid-container full">
            <div class="grid-x grid-padding-x">
                <div class="cell small-12 medium-6 component__contactform_cellinput">
                    <input class="component__contactform_form_first_radio_input" type="radio" name="insurance-type" data-vv-as="insurance type"
                           id="not-insured" v-bind:value="false" v-model="form.insured" v-validate="'required'">
                    <label class="component__contactform_form_first_radio component__contactform_form_first_radio--notinsured"
                           for="not-insured">
                        <span class="component__contactform_form_first_radio_icon">
                                <font-awesome-icon icon="times"/>
                            </span>
                        <span class="component__contactform_form_first_radio_title">No</span>
                        <span class="component__contactform_form_first_radio_subtitle">I Need Coverage</span>
                    </label>
                </div>
                <div class="cell small-12 medium-6 component__contactform_cellinput">
                    <input class="component__contactform_form_first_radio_input" type="radio" name="insurance-type" data-vv-as="insurance type"
                           id="insured" v-bind:value="true" v-model="form.insured" v-validate="'required'">
                    <label class="component__contactform_form_first_radio component__contactform_form_first_radio--insured"
                           for="insured">
                        <span class="component__contactform_form_first_radio_icon">
                                <font-awesome-icon icon="check"/>
                            </span>
                        <span class="component__contactform_form_first_radio_title">Yes</span>
                        <span class="component__contactform_form_first_radio_subtitle">But I Need Savings</span>
                    </label>
                </div>
            </div>
            <span v-show="errors.has('insurance-type')" class="component__contactform_inputerror component__contactform_inputerror--inline">{{ errors.first('insurance-type') }}</span>
        </div>
        <button class="component__contactform_form_first_next btn btn--normal btn--light-blue" type="button" v-on:click="goNext" :disabled="errors.any()" v-if="form.insured !== ''">Get
            started
        </button>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

	export default {
		name: 'component-contactformfirst',
		methods: {
			goNext: function () {
				this.$validator.validateAll().then((result) => {
					if (result) {
						this.$store.dispatch('switchStepFirst', false);
						this.$store.dispatch('switchStepSecond', true);
					}
				});
			}
		},
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
