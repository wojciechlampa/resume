<template>
    <div class="component__contactform_form_third">
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
        <div class="grid-x">
            <div class="grid-x grid-padding-x">
                <div class="cell small-12 component__contactform_cellinput">
                    <input
                            type="text"
                            name="year-built"
                            title="Year built"
                            placeholder="Year built"
                            v-model="formBody.yearBuilt"
                            v-validate="'required|min_value:1700|max:4'"
                            data-vv-as="year built"
                            :class="{ 'error': errors.has('year-built') }"
                    >
                    <span v-show="errors.has('year-built')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('year-built') }}</span>
                </div>
                <div class="cell small-12 component__contactform_cellinput">
                    <select
                            name="property-type"
                            title="Property type"
                            v-model="formBody.propertyType"
                            v-validate="'required'"
                            data-vv-as="property type"
                            :class="{ 'error': errors.has('property-type') }"
                    >
                        <option value="" disabled selected>Property type</option>
                        <option value="House">House</option>
                        <option value="Condo">Condo</option>
                        <option value="Apartment">Apartment</option>
                    </select>
                    <span v-show="errors.has('property-type')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('property-type') }}</span>
                </div>
                <div class="cell small-12 component__contactform_cellinput">
                    <select
                            name="construction-class"
                            title="Construction class"
                            v-model="formBody.constructionClass"
                            v-validate="'required'"
                            data-vv-as="construction class"
                            :class="{ 'error': errors.has('construction-class') }"
                    >
                        <option value="" disabled selected>Construction class</option>
                        <option value="Standard frame single wall">Standard frame single wall</option>
                        <option value="Standard frame double wall">Standard frame double wall</option>
                        <option value="Superior frame">Superior frame</option>
                        <option value="Masonry">Masonry</option>
                        <option value="Semi wind resistive">Semi wind resistive</option>
                        <option value="Wind resistive">Wind resistive</option>
                        <option value="Superior wind resistive">Superior wind resistive</option>
                    </select>
                    <span v-show="errors.has('construction-class')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('construction-class') }}</span>
                </div>
                <div class="cell small-12 component__contactform_cellinput">
                    <select
                            name="foundation-type"
                            title="Foundation type"
                            v-model="formBody.foundationType"
                            v-validate="'required'"
                            data-vv-as="foundation type"
                            :class="{ 'error': errors.has('foundation-type') }"
                    >
                        <option value="" disabled selected>Foundation type</option>
                        <option value="Basement">Basement</option>
                        <option value="Shallow basement">Shallow basement</option>
                        <option value="Concrete slab">Concrete slab</option>
                        <option value="Crawl space">Crawl space</option>
                        <option value="Pier and grade beam">Pier and grade beam</option>
                        <option value="Elevated posts/pier and grade beam(stilts)">Elevated posts/pier and grade
                            beam(stilts)
                        </option>
                        <option value="Stilts with sweep away walls">Stilts with sweep away walls</option>
                        <option value="Deep pilings">Deep pilings</option>
                        <option value="Unknown">Unknown</option>
                    </select>
                    <span v-show="errors.has('foundation-type')" class="component__contactform_inputerror component__contactform_inputerror--box">{{ errors.first('foundation-type') }}</span>
                </div>
            </div>
        </div>
        <button v-on:click="submitForm" class="component__contactform_form_second_next btn btn--normal btn--blue"
                type="submit">Submit
        </button>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

	export default {
		name: 'component-contactformthird',
		methods: {
			goBack: function () {
				this.$store.dispatch('switchStepSecond', true);
				this.$store.dispatch('switchStepThird', false);
			},
			submitForm: function (event) {
				this.$validator.validateAll().then((result) => {
					if (!result) {
						event.preventDefault();
					}
				})
			}
		},
        computed: {
            ...mapState([
            	'formBody'
            ])
        }
	}
</script>

<style lang="scss">

</style>
