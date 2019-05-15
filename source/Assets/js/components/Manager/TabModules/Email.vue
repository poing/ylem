<template>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
					<h5 class="font-weight-bold">Email List -</h5>
					<ul class="list-group">
						<li v-for="email in contactMedium" v-if="email.type == 'email'" class="list-group-item">
							{{ email.medium.emailAddress }}
							<span v-if="email.preferred" class="ml-2 badge badge-success">
								Primary
								<i class="fa fa-check"></i>
							</span>
						</li>
					</ul>	
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<label>Add Email</label>
					<div class="input-group">
						<input v-model="newEmail" type="email" class="form-control" placeholder="Enter new email">
						<div class="input-group-append">
							<button @click="addEmail" class="btn btn-success">Add Email</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-6">
					<label>Primary Email</label>
					<div class="input-group">
						<select v-model="preferredEmail">
							<option v-for="email in contactMedium" v-if="email.type == 'email'" :value="email.id">
								{{ email.medium.emailAddress }}
							</option>	
						</select>
						<div class="input-group-append">
							<button @click="updatePreferred" class="btn btn-success">Save</button>
						</div>
					</div>
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
				newEmail: '',
				contactMedium: [],
				preferredEmail: null
			}
		},
		methods: {
			addEmail() {
				const self = this;
				axios.post('/api/admin/email/store', {
					email: self.newEmail,
					partyId: self.tabData.party.id,
					partyType: self.tabData.party_type
				}).then(res => {
					self.contactMedium.push(res.data);
					self.newEmail = '';
				}).catch(e => {
					console.log(e);
				});
			},
			updatePreferred() {
				const self = this;
				axios.post('/api/admin/email/preferred', {
					preferredId: self.preferredEmail,
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

					// Set the preffered email
					this.preferredEmail = this.tabData.party.contactMedium.map(cm => {
						if (cm.type == "email" && cm.preferred) {
							return cm;
						}
					}).filter(d => d != undefined)[0].id
				}
			}
		}
	}
</script>
