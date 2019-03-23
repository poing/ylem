<template>
	<div class="card">
		<nav class="navbar tab-navbar navbar-expand">
			<div class="navbar-brand font-weight-bold">
				<i :class="`fa ${isOrg() ? (this.tabInfo.party.isLegalEntity ? 'fa-building' : 'fa-users') : 'fa-user'} mr-2`"></i>
				{{ isOrg() ? tabInfo.party.isLegalEntity ? tabInfo.party_type.split('\\').pop() : 'Unit' : tabInfo.party_type.split('\\').pop() }}
			</div>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto"></ul>
				<ul class="nav tab-item-holder text-secondary justify-content-end">
					<li @click="tabOpen = i" v-for="(tab, i) in tabs" :class="`nav-item ${tabOpen === i ? 'active': ''}`">
						<span class="nav-link">{{ tab }}</span>
					</li>
				</ul>
			</div>
		</nav>

		<!-- For Info -->
		<div v-if="tabOpen === 0" class="card-body">
			<Individual :tabData="tabInfo" v-if="!isOrg()"></Individual>
			<Organization :tabData="tabInfo" v-if="isOrg() && tabInfo.party.isLegalEntity"></Organization>
			<Unit :tabData="tabInfo" v-if="isOrg() && !tabInfo.party.isLegalEntity"></Unit>
		</div>

		<!-- For Relations -->
		<div v-if="tabOpen === 1" class="card-body">
			<Relations :tabData="tabInfo"></Relations>
		</div>

		<!-- For Email -->
		<div v-if="tabOpen === 2" class="card-body">
			<Email :tabData="tabInfo"></Email>
		</div>
	</div>
</template>

<script>
	import Individual from './TabModules/Individual.vue';
	import Organization from './TabModules/Organization.vue';
	import Unit from './TabModules/Unit.vue';
	import Relations from './TabModules/Relations.vue';
	import Email from './TabModules/Email.vue';

	export default {
		props: {
			tabInfo: Object
		},
		components: {
			Individual,
			Organization,
			Unit,
			Relations,
			Email
		},
		data() {
			return {
				tabs: ['Info', 'Relations', 'Email'],
				tabOpen: 0
			}
		},
		methods: {
			isOrg() {
				return this.tabInfo.party_type.includes('Organization');
			}
		}
	};
</script>
