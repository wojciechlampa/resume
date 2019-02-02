import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export const store = new Vuex.Store({
	state: {
		islands: [],
		currentPhoneNumber: '',
		currentLocation: 'hawaii',
		defaultLocation: 'hawaii',
		form: {
			steps: {
				first: true,
				second: false,
				third: false,
				thankyou: false,
			},
			insured: '',
			insuredDetails: false,
			sendStatus: ''
		},
		formBody: {
			name : '',
			address : '',
			phone : '',
			email : '',
			currentInsuranceCarrier : '',
			datePolicyStarted : '',
			yearBuilt : '',
			propertyType : '',
			constructionClass : '',
			foundationType : ''
		},
		posts: {},
		reviews: {}
	},
	mutations: {
		updateDefaultLocation(state, islands) {
			state.islands = islands
		},
		updateLoadedIslands(state, islands) {
			state.islands = islands
		},
		updateLoadedPhoneNumber(state, islands) {
			state.currentPhoneNumber = islands.default.phone
		},
		updateCurrentLocation(state, location) {
			state.currentLocation = location
		},
		updatePhoneNumber(state, phone) {
			state.currentPhoneNumber = phone
		},
		updateStepFirst(state, bool) {
			state.form.steps.first = bool
		},
		updateStepSecond(state, bool) {
			state.form.steps.second = bool
		},
		updateStepSecondInsured(state, bool) {
			state.form.insuredDetails = bool
		},
		updateStepThird(state, bool) {
			state.form.steps.third = bool
		},
		updateStepThankyou(state, bool) {
			state.form.steps.thankyou = bool
		},
		updateFormStatus(state, bool) {
			state.form.sendStatus = bool
		},
		updatePosts(state, posts) {
			state.posts = posts
		},
		updateReviews(state, reviews) {
			state.reviews = reviews
		}
	},
	actions: {
		loadIslands({commit}) {
			axios
				.get('/wp-json/hyperlocal/v2/all')
				.then(r => r.data)
				.then((response) => {
					commit('updateLoadedIslands', response.options);
					commit('updateLoadedPhoneNumber', response.options);
					commit('updateDefaultLocation', response.options);
				});
		},
		switchLocation({commit}, {island, phone}) {
			commit('updateCurrentLocation', island);
			commit('updatePhoneNumber', phone);
		},
		switchStepFirst({commit}, bool) {
			commit('updateStepFirst', bool);
		},
		switchStepSecond({commit}, bool) {
			commit('updateStepSecond', bool);
		},
		switchStepSecondInsured({commit}, bool) {
			commit('updateStepSecondInsured', bool);
		},
		switchStepThird({commit}, bool) {
			commit('updateStepThird', bool);
		},
		switchStepThankyou({commit}, bool) {
			commit('updateStepThankyou', bool);
		},
		switchFormStatus({commit}, bool) {
			commit('updateFormStatus', bool);
		},
		pushPosts({commit}, posts) {
			commit('updatePosts', posts);
		},
		pushReviews({commit}, reviews) {
			commit('updateReviews', reviews);
		}
	}
});