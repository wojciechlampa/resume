import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import VeeValidate from 'vee-validate'
import './registerServiceWorker'
import './filters'
import './methods'

// FontAwesome

import { library } from '@fortawesome/fontawesome-svg-core'
import { faShoppingCart, faSearch, faPhone, faCalendar, faArrowRight, faCartPlus, faStar, faTimes } from '@fortawesome/free-solid-svg-icons'
import { faEye } from '@fortawesome/free-regular-svg-icons'
import { faFacebook, faTwitter, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add( faShoppingCart, faSearch, faPhone, faCalendar, faArrowRight, faCartPlus, faEye, faStar, faTimes, faFacebook, faTwitter, faInstagram )

Vue.component('font-awesome-icon', FontAwesomeIcon)

// end FontAwesome

Vue.use(VeeValidate);

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
