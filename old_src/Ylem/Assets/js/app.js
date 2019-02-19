import Vue from 'vue';
import VueRouter from 'vue-router';
import VueScrollTo from 'vue-scrollto';
import routes from './lbd/routes/routes';
import LightBootstrap from './lbd/light-bootstrap-main'

Vue.use(VueRouter);
Vue.use(LightBootstrap);
Vue.use(VueScrollTo);

const router = new VueRouter({
	mode: 'history',
	routes,
	linkActiveClass: 'nav-item active'
});

export { router };
