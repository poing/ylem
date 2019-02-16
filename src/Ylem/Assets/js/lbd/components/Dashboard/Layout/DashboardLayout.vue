<template>
  <div class="wrapper">
    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link :key="child.path" v-for="child in routes[1].children" :to="/admin/ + child.path">
	    <i :class="`nc-icon ${child.icon}`"></i>
		<p>{{ child.name }}</p>
      </sidebar-link>
    </side-bar>
    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content @click="toggleSidebar">

      </dashboard-content>
    </div>
  </div>
</template>
<style lang="scss">

</style>
<script>
	import TopNavbar from './TopNavbar.vue'
	import DashboardContent from './Content.vue'
	import MobileMenu from './MobileMenu.vue'
	import routes from '../../../routes/routes.js'

	export default {
		components: {
		  TopNavbar,
		  DashboardContent,
		  MobileMenu
		},
		data() {
			return {
				routes: routes
			}	
		},
		methods: {
		  toggleSidebar () {
			if (this.$sidebar.showSidebar) {
			  this.$sidebar.displaySidebar(false)
			}
		  }
		}
	}

</script>
