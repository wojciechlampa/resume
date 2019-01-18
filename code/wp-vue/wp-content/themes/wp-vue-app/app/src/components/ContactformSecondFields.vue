<template>
    <div class="component__contactform_form_second_details">
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 medium-6 component__contactform_cellinput">
                <input
                        type="text"
                        name="first-name"
                        placeholder="First name"
                        v-model="formBody.firstName"
                        v-validate="'required|alpha_spaces|min:2'"
                        data-vv-as="first name"
                        :class="{ 'error': errors.has('first-name') }"
                >
                <span v-show="errors.has('first-name')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('first-name') }}</span>
            </div>
            <div class="cell small-12 medium-6 component__contactform_cellinput">
                <input
                        type="text"
                        name="last-name"
                        placeholder="Last name"
                        v-model="formBody.lastName"
                        v-validate="'required|alpha_spaces|min:2'"
                        data-vv-as="last name"
                        :class="{ 'error': errors.has('last-name') }"
                >
                <span v-show="errors.has('last-name')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('last-name') }}</span>
            </div>
            <div class="cell small-12 medium-6 component__contactform_cellinput">
                <input
                        type="text"
                        name="address"
                        placeholder="Address"
                        v-model="formBody.address"
                        v-validate="'required|min:2'"
                        data-vv-as="address"
                        :class="{ 'error': errors.has('address') }"
                >
                <span v-show="errors.has('address')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('address') }}</span>
            </div>
            <div class="cell small-12 medium-6 component__contactform_cellinput">
                <input
                        type="tel"
                        name="phone"
                        placeholder="Phone"
                        v-model="formBody.phone"
                        v-validate="'required|regex:[0-9*#+]|min:14'"
                        v-mask="'(###) ###-####'"
                        data-vv-as="phone"
                        :class="{ 'error': errors.has('phone') }"
                >
                <span v-show="errors.has('phone')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('phone') }}</span>
            </div>
            <div class="cell small-12 medium-6 component__contactform_cellinput">
                <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        v-model="formBody.email"
                        v-validate="'required|email'"
                        data-vv-as="email"
                        :class="{ 'error': errors.has('email') }"
                >
                <span v-show="errors.has('email')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('email') }}</span>
            </div>
        </div>
        <button v-on:click="goNext" class="component__contactform_form_second_next btn btn--normal btn--light-blue"
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
			goNext: function () {
				this.$validator.validateAll().then((result) => {
					if (result) {
						this.$store.dispatch('switchStepSecond', false);
						this.$store.dispatch('switchStepThird', true);
					}
				});
			}
		},
		name: 'component-contactformsecondfields',
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