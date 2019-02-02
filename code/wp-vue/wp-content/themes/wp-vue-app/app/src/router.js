import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './pages/Home'
import Articles from './pages/Articles'
import Thankyou from './pages/Thankyou'
import Media from './pages/Media'
import Post from './pages/Post'
import Notfound from './pages/Notfound'

Vue.use(VueRouter);

const router = new VueRouter({
	mode: 'history',
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		},
		{
			path: '/articles',
			name: 'articles',
			component: Articles
		},
		{
			path: '/thank-you',
			name: 'thankyou',
			component: Thankyou
		},
		{
			path: '/media',
			name: 'media',
			component: Media
		},
		{
			path: '/post/:slug',
			name: 'post',
			component: Post
		},
		{
			path: '*',
			name: 'notfound',
			component: Notfound
		}
	]
});

export default router;