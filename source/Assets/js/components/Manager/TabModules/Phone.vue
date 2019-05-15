<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<h5 class="font-weight-bold">Phone Information -</h5>
					<ul class="list-group">
						<li v-for="phone in contactMedium" v-if="phone.type == 'phone'" class="list-group-item">
							{{ phone.medium.number }} <br>
							<span v-if="phone.preferred" class="badge badge-success">
								Primary
								<i class="fa fa-check"></i>
							</span>
							<span @click="updatePreferred(phone.id)" v-else class="badge badge-light make_primary_address_badge">
								Set Primary
								<i class="fa fa-check"></i>
							</span>
						</li>
					</ul>	
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<h3>Add Phone -</h3>
					<label>Phone Number</label>
					<input v-model="number" type="text" class="form-control" placeholder="Enter number">
					<button @click="addPhone" class="btn btn-success mt-2">Add Number</button>
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
				number: '',
				contactMedium: [],
			}
		},
		methods: {
			addPhone() {
				const self = this;
				axios.post('/api/admin/phone/store', {
					number: self.number,
					partyId: self.tabData.party.id,
					partyType: self.tabData.party_type
				}).then(res => {
					self.contactMedium.push(res.data);
					self.number = '';
				}).catch(e => {
					console.log(e);
				});
			},
			updatePreferred(preferredPhoneId) {
				const self = this;
				axios.post('/api/admin/phone/preferred', {
					preferredId: preferredPhoneId,
					partyId: self.tabData.party_id,
					partyType: self.tabData.party_type,
					partyRelationshipId: self.tabData.id
				}).then(res => {
					self.contactMedium = res.data.party.contactMedium
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


