<template>
	<div class="breadcrumb-nav">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
			<li v-if="crumbs.length <= 0" class="breadcrumb-item active">/</li>
			<li @click="openCrumb(crumb, i == (crumbs.length - 1))" v-else v-for="(crumb, i) in crumbs" :class="`breadcrumb-item ${i == (crumbs.length - 1)}`">
				<a :title="crumb.party_type.includes('Organization') ? crumb.party.tradingName : crumb.party.fullName" v-if="i != (crumbs.length - 1)" href="#">
					{{ 
					crumb.party_type.includes('Organization') ? ((crumbs.length >= 5) ? crumb.party.tradingName.charAt(0) : crumb.party.tradingName) : ((crumbs.length >= 5) ? crumb.party.fullName.charAt(0) : crumb.party.fullName)
					}}
				</a>
				<span v-else>{{ crumb.party_type.includes('Organization') ? crumb.party.tradingName : crumb.party.fullName }}</span>
			</li>
		  </ol>
		</nav>
	</div>
</template>

<script>
	export default {
		props: {
			crumbs: Array
		},
		methods: {
			openCrumb(crumb, active) {
				if (!active) { // Only be able to click when not active crumb
					this.$emit('openCrumb', crumb);
				}
			}
		}
	}	
</script>
