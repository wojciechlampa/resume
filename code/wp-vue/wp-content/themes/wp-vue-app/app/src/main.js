import Vue from 'vue'
import Vuex from 'vuex'
import router from './router'
import Meta from 'vue-meta'
import VeeValidate from 'vee-validate'
import VueMask from 'v-mask'
import axios from 'axios'
import App from './layouts/Main'

import {store} from './store'
import {mapState} from 'vuex'
import './filters'
import {mascotParallax} from './custom'

import {library} from '@fortawesome/fontawesome-svg-core'
import {faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft);

Vue.use(VeeValidate);
Vue.use(VueMask);
Vue.use(Meta);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;
Vue.config.debug = true;

new Vue({
	el: '#app',
	metaInfo: {
		title: 'Cheapest Hurricane Insurance In Hawaii',
		titleTemplate: '%s'
	},
	created() {
		this.loadPosts();
		mascotParallax();
	},
	computed: {
		...mapState([
			'posts'
		])
	},
	methods: {
		loadPosts: function () {
			axios
				.get('/wp-json/wp/v2/posts')
				.then(r => r.data)
				.then((response) => {
					this.$store.dispatch('pushPosts', response);
				});
		}
	},
	store,
	router,
	Vuex,
	components: {
		App
	},
	template: '<App/>'
});