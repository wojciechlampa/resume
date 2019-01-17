<template>
    <section class="component__contactform">
        <h2 class="component__contactform_title">
            <strong>Answer a few questions</strong><br>
            <span class="component__contactform_title_sub">
                and an agent will contact you.
            </span>
        </h2>
        <form class="component__contactform_form" action="" v-on:submit.prevent="sendForm">
            <template v-if="form.steps.first">
                <component-contactformfirst></component-contactformfirst>
            </template>
            <template v-if="form.steps.second">
                <component-contactformsecond></component-contactformsecond>
            </template>
            <template v-if="form.steps.third">
                <component-contactformthird></component-contactformthird>
            </template>
            <div class="component__contactform_form_secure">
                <font-awesome-icon icon="lock"/>
                Your information is safe & secure
            </div>
        </form>
    </section>
</template>

<script>
	import axios from 'axios';
	import ComponentContactformfirst from "./ContactformFirst";
	import ComponentContactformsecond from "./ContactformSecond";
	import ComponentContactformthird from "./ContactformThird";
	import {mapState} from 'vuex'

	export default {
		data: function () {
			return {}
		},
		methods: {
			sendForm: function () {
				let formData = new FormData();
				let formUrl = '/wp-json/contact-form-7/v1/contact-forms/11/feedback';

				formData.set('_wpcf7', 11);
				formData.set('_wpcf7_version', '5.0.2');
				formData.set('_wpcf7_locale', 'en_US');
				formData.set('_wpcf7_unit_tag', 'wpcf7-f11-o1');
				formData.set('_wpcf7_container_post', 0);
				formData.set('first-name', this.formBody.firstName);
				formData.set('last-name', this.formBody.lastName);
				formData.set('address', this.formBody.address);
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
					.then(function (response) {
						console.log(response);
					})
					.catch(function (error) {
						console.log(error);
					});
			}
		},
		name: 'component-contactform',
		components: {
			ComponentContactformthird,
			ComponentContactformsecond,
			ComponentContactformfirst
		},
		computed: {
			...mapState([
				'form',
				'formBody'
			])
		},
        watch: {
			formBody: function () {
                if (formBody.insured) {
                	console.log('insured')
                } else {
					console.log('not insured')
                }
			}
        }
	}
</script>

<style lang="scss">
    @import '../styles/components/contactform';
</style>
