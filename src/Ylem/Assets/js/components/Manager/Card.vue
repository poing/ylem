<template>
	<div class="row party-card-holder">
		<div class="col-md-12">
			<div :class="`card party-info-card ${isOpenParent() ? 'border-dark' : 'border-grey'} mb-3`">
			  <span v-if="cardInfo.children.length" @click="openChild" class="card-icon-right">
				  <i class="fa fa-caret-right"></i>
			  </span>
			  <div class="card-header font-weight-bold">
				  <drop-down class="pull-right option-dropdown">
					<template slot="title">
					    <i class="fa fa-ellipsis-v"></i>
					</template>
					<a @click="viewDetails" class="dropdown-item" href="#">
						<i class="fa fa-eye"></i>
						View Details
					</a>
					<a class="dropdown-item" href="#">
						<i class="fa fa-edit"></i>
						Edit
					</a>
				  </drop-down>
				  <i v-if="cardInfo.party_type.includes('Organization')" class="fa fa-users mr-2"></i>
				  <i v-else class="fa fa-user mr-2"></i>
				  {{ (cardInfo.party_type.includes('Organization')) ? cardInfo.party.tradingName : cardInfo.party.fullName }}
			  </div>
			  <div class="card-body text-dark">
				  <p class="card-text">{{ (cardInfo.party_type.includes('Organization')) ? cardInfo.party.type : cardInfo.party.location }}</p>
			  </div>
			</div>
		</div>
	</div>
</template>

<script>
	import DropDown from '../../lbd/components/UIComponents/Dropdown.vue';

	export default {
		props: {
			cardInfo: Object
		},
		components: {
			DropDown
		},
		methods: {
			openChild() {
				this.$emit('openChild', this.cardInfo);
			},
			isOpenParent() {
				const parent = this.$parent.$parent;
				// Check if exists as rootId or in childs
				if (parent.rootId === this.cardInfo.id || parent.childs.map(child => child.id).includes(this.cardInfo.id)) {
					return true;
				}
				return false;
			},
			viewDetails() {
				this.$emit('viewDetails', this.cardInfo);
			}
		}
	}	
</script>
