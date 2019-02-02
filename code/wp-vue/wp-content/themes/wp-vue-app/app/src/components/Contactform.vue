<template>
    <section class="component__contactform">
        <h1 class="component__contactform_title">
            Are you looking for <br>affordable Hurricane insurance?
        </h1>
        <h2 class="component__contactform_subtitle">
            Answer a few questions <br>
            <span>to get a quote</span>
        </h2>
        <form class="component__contactform_form" id="component__contactform_form" action="" v-on:submit.prevent="sendForm">
            <template v-if="form.steps.first">
                <component-contactformfirst></component-contactformfirst>
            </template>
            <template v-if="form.steps.second">
                <component-contactformsecond></component-contactformsecond>
            </template>
            <template v-if="form.steps.third">
                <component-contactformthird></component-contactformthird>
            </template>
            <template v-if="form.steps.thankyou">
                <component-contactformthankyou></component-contactformthankyou>
            </template>
        </form>
        <div class="component__contactform_form_secure">
            <font-awesome-icon icon="lock"/>
            Your information is safe & secure
        </div>
    </section>
</template>

<script>
	import axios from 'axios';
	import router from './../router'
	import ComponentContactformfirst from "./ContactformFirst";
	import ComponentContactformsecond from "./ContactformSecond";
	import ComponentContactformthird from "./ContactformThird";
	import ComponentContactformthankyou from "./ContactformThankyou";
	import {mapState} from 'vuex'

	export default {
		data: function () {
			return {}
		},
		methods: {
			toTitleCase: function (str) {
		        return str.replace(/\w\S*/g, function(txt){
			        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
		        })
            },
			sendForm: function () {
				let formData = new FormData();
				let formUrl = '/wp-json/contact-form-7/v1/contact-forms/5/feedback';

				if (this.form.insured) {
					this.form.insured = 'Insured';
					this.form.insuredClass = 'insured';
                } else {
					this.form.insured = 'Not insured';
					this.form.insuredClass = 'not-insured';
					this.formBody.currentInsuranceCarrier = '';
					this.formBody.datePolicyStarted = '';
                }

				formData.set('_wpcf7', 5);
				formData.set('_wpcf7_version', '5.0.2');
				formData.set('_wpcf7_locale', 'en_US');
				formData.set('_wpcf7_unit_tag', 'wpcf7-f5-o1');
				formData.set('_wpcf7_container_post', 0);
				formData.set('status', this.form.insured);
				formData.set('status-class', this.form.insuredClass);
				formData.set('name', this.toTitleCase(this.formBody.name));
				formData.set('address', this.toTitleCase(this.formBody.address));
				formData.set('phone', this.formBody.phone);
				formData.set('email', this.formBody.email);
				formData.set('current-insurance-carrier', this.formBody.currentInsuranceCarrier);
				formData.set('date-policy-started', this.formBody.datePolicyStarted);
				formData.set('year-built', this.formBody.yearBuilt);
				formData.set('property-type', this.formBody.propertyType);
				formData.set('construction-class', this.formBody.constructionClass);
				formData.set('foundation-type', this.formBody.foundationType);

				axios({
					method: 'post',
					url: formUrl,
					data: formData,
					config: {
						headers: {
							'Content-Type': 'multipart/form-data'
						}
					}
				})
                    .then( (response) => {
						this.$store.dispatch('switchStepThird', false);
						this.$store.dispatch('switchStepThankyou', true);
						this.$store.dispatch('switchFormStatus', true);
                        router.push({ name: 'thankyou'})
                    } )
					.catch(function (error) {
						console.log(error);
					});
			}
		},
		name: 'component-contactform',
		components: {
			ComponentContactformthird,
			ComponentContactformsecond,
			ComponentContactformfirst,
			ComponentContactformthankyou
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
    @import '../styles/components/contactform';
</style>
