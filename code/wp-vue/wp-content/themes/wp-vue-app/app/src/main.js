import Vue from 'vue'
import Vuex from 'vuex'
import App from './layouts/Main'
import { store } from './store'
import './filters'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;
Vue.config.debug = true;

new Vue({
	el: '#app',
	store,
	Vuex,
	components: {
		App
	},
	template: '<App/>'
});