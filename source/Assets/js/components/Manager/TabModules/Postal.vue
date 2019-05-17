<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<h5 class="font-weight-bold">Postal Information -</h5>
					<ul class="list-group">
						<li v-for="postal in contactMedium" v-if="postal.type == 'postal'" class="list-group-item">
							{{ postal.medium.street1 }} <br>
							{{ (postal.medium.street2) ? postal.medium.street2 : '' }}
							{{ postal.medium.city }}, {{ postal.medium.stateOrProvince }} - {{ postal.medium.postcode }} <br>
							{{ postal.medium.country }} <br>
							<span v-if="postal.preferred" class="badge badge-success">
								Primary
								<i class="fa fa-check"></i>
							</span>
							<span @click="updatePreferred(postal.id)" v-else class="badge badge-light make_primary_address_badge">
								Set Primary
								<i class="fa fa-check"></i>
							</span>
						</li>
					</ul>	
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<h3>Add Address -</h3>
					<label>City</label>
					<input v-model="city" type="text" class="form-control" placeholder="Enter city">
					<label>Country</label>
					<input v-model="country" type="text" class="form-control" placeholder="Enter country">
					<label>State Or Province</label>
					<input v-model="stateOrProvince" type="text" class="form-control" placeholder="Enter state or province">
					<label>Postcode</label>
					<input v-model="postcode" type="text" class="form-control" placeholder="Enter postcode">
					<label>Street 1</label>
					<input v-model="street1" type="text" class="form-control" placeholder="Enter street">
					<label>Street 2</label>
					<input v-model="street2" type="text" class="form-control" placeholder="Enter street">
					<button @click="addAddress" class="btn btn-success mt-2">Add Address</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			tabData: Object
		},
		data() {
			return {
				city: '',
				country: '',
				stateOrProvince: '',
				postcode: '',
				street1: '',
				street2: '',
				contactMedium: [],
			}
		},
		methods: {
			addAddress() {
				const self = this;
				axios.post('/api/admin/postal/store', {
					city: self.city,
					country: self.country,
					stateOrProvince: self.stateOrProvince,
					postcode: self.postcode,
					street1: self.street1,
					street2: self.street2,
					partyId: self.tabData.party.id,
					partyType: self.tabData.party_type
				}).then(res => {
					self.contactMedium.push(res.data);
					self.city = '';
					self.country = '';
					self.stateOrProvince = '';
					self.postcode = '';
					self.street1 = '';
					self.street2 = '';
				}).catch(e => {
					console.log(e);
				});
			},
			updatePreferred(preferredPostalId) {
				const self = this;
				axios.post('/api/admin/postal/preferred', {
					preferredId: preferredPostalId,
					partyId: self.tabData.party_id,
					partyType: self.tabData.party_type,
					partyRelationshipId: self.tabData.id
				}).then(res => {
					self.contactMedium = res.data.party.contactMedium
					self.$parent.$props.tabInfo.party.contactMedium = res.data.party.contactMedium;
				}).catch(e => {
					console.log(e);
				});
			}
		},
		watch: {
			tabData: {
				immediate: true,
				handler() {
					this.contactMedium = this.tabData.party.contactMedium
				}
			}
		}
	}
</script>

