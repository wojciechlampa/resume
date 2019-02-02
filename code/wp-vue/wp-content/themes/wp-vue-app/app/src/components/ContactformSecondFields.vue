<template>
    <div class="component__contactform_form_second_details">
        <div class="component__contactform_form_toplabel">
            Fill in contact information below:
        </div>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12 component__contactform_cellinput">
                <label for="name">Name <span>*</span></label>
                <input
                        type="text"
                        id="name"
                        name="name"
                        v-model="formBody.name"
                        v-validate="'required|alpha_spaces|min:2'"
                        data-vv-as="name"
                        :class="{ 'error': errors.has('name') }"
                >
                <span v-show="errors.has('name')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('name') }}</span>
            </div>
            <div class="cell small-12 component__contactform_cellinput">
                <label for="address">Address <span>*</span></label>
                <input
                        type="text"
                        id="address"
                        name="address"
                        v-model="formBody.address"
                        v-validate="'required|min:2'"
                        data-vv-as="address"
                        :class="{ 'error': errors.has('address') }"
                >
                <span v-show="errors.has('address')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('address') }}</span>
            </div>
            <div class="cell small-12 component__contactform_cellinput">
                <label for="phone">Phone <span>*</span></label>
                <input
                        type="tel"
                        id="phone"
                        name="phone"
                        v-on:keyup="preventZero($event)"
                        v-model="formBody.phone"
                        v-validate="'required|regex:[0-9*#+]|min:14'"
                        v-mask="'(###) ###-####'"
                        data-vv-as="phone"
                        :class="{ 'error': errors.has('phone') }"
                >
                <span v-show="errors.has('phone')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('phone') }}</span>
            </div>
            <div class="cell small-12 component__contactform_cellinput">
                <label for="email">Email <span>*</span></label>
                <input
                        type="email"
                        id="email"
                        name="email"
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
			},
            preventZero: function ($event) {
				console.log($event);
				if ((($event.target.value === '(1' || $event.target.value === '1') || ($event.target.value === '(0' || $event.target.value === '0')) && ($event.key === '1' || $event.key === '0')) {
					$event.target.value = '';
                }
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