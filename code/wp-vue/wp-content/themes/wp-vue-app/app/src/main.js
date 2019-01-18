import Vue from 'vue'
import Vuex from 'vuex'
import VeeValidate from 'vee-validate'
import VueMask from 'v-mask'
import App from './layouts/Main'
import { store } from './store'
import './filters'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faLock, faTimes, faCheck, faStar, faAngleRight, faAngleLeft);

Vue.use(VeeValidate);
Vue.use(VueMask);

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