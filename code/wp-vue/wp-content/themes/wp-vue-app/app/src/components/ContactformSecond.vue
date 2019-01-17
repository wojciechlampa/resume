<template>
    <div class="component__contactform_form_second">
        <div class="component__contactform_form_return">
            <button v-on:click="goBack" type="button"
                    class="component__contactform_form_return_button btn btn--text btn--back btn--light-blue">
                <font-awesome-icon icon="angle-left"/>
                Go back
            </button>
        </div>
        <div class="component__contactform_form_toplabel">
            Fill up fields below:
        </div>
        <template v-if="!form.insuredDetails && form.insured">
            <div class="component__contactform_form_second_insured">
                <div class="grid-x grid-padding-x">
                    <div class="cell small-12 component__contactform_cellinput">
                        <input type="text" name="insurance-carrier" placeholder="Current insurance carrier" v-model="formBody.currentInsuranceCarrier">
                    </div>
                    <div class="cell small-12 component__contactform_cellinput">
                        <input type="text" name="policy-started" placeholder="Date policy started" v-model="formBody.datePolicyStarted" v-bind:type="type" v-on:focus="inputOnFocusDate">
                    </div>
                </div>
                <button v-on:click="goDetails" class="component__contactform_form_second_next btn btn--normal btn--light-blue"
                        type="button">Next
                </button>
            </div>
        </template>
        <template v-else>
            <div class="component__contactform_form_second_details">
                <div class="grid-x grid-padding-x">
                    <div class="cell small-12 medium-6 component__contactform_cellinput">
                        <input type="text" name="first-name" placeholder="First name" v-model="formBody.firstName">
                    </div>
                    <div class="cell small-12 medium-6 component__contactform_cellinput">
                        <input type="text" name="last-name" placeholder="Last name" v-model="formBody.lastName">
                    </div>
                    <div class="cell small-12 medium-6 component__contactform_cellinput">
                        <input type="text" name="address" placeholder="Address" v-model="formBody.address">
                    </div>
                    <div class="cell small-12 medium-6 component__contactform_cellinput">
                        <input type="tel" name="phone" placeholder="Phone" v-model="formBody.phone">
                    </div>
                    <div class="cell small-12 medium-6 component__contactform_cellinput">
                        <input type="email" name="email" placeholder="Email" v-model="formBody.email">
                    </div>
                </div>
            </div>
        </template>
        <button v-if="(!form.insuredDetails && !form.insured) || (form.insuredDetails && form.insured)" v-on:click="goNext" class="component__contactform_form_second_next btn btn--normal btn--light-blue"
                type="button">Next
        </button>
    </div>
</template>

<script>
	import {mapState} from 'vuex';

	export default {
		data: function () {
			return {
				type: 'text'
            }
		},
		methods: {
			goNext: function () {
				this.$store.dispatch('switchStepSecond', false);
				this.$store.dispatch('switchStepThird', true);
			},
			goDetails: function () {
				this.$store.dispatch('switchStepSecondInsured', true);
			},
			goBack: function () {
				if (this.form.insuredDetails) {
					this.$store.dispatch('switchStepSecondInsured', false);
                } else {
					this.$store.dispatch('switchStepFirst', true);
					this.$store.dispatch('switchStepSecond', false);
                }
			},
            inputOnFocusDate: function (id, test) {
				console.log(id + ' ' + test);
				console.log(this);
                this.type = 'date';
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