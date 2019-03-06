<template>
	<form>
	  <div class="form-group">
		<label>Title</label>
		<input v-model="title" type="text" class="form-control" placeholder="Enter title">
	  </div>
	  <div class="form-group">
		<label>Given Name</label>
		<input v-model="givenName" type="text" class="form-control" placeholder="Enter given name">
	  </div>
	  <div class="form-group">
		<label>Middle Name</label>
		<input v-model="middleName" type="text" class="form-control" placeholder="Enter middle name">
	  </div>
	  <div class="form-group">
		<label>Family Name</label>
		<input v-model="familyName" type="text" class="form-control" placeholder="Enter family name">
	  </div>
	  <div class="form-group">
		<label>Full Name</label>
		<input v-model="fullName" type="text" class="form-control" placeholder="Enter full name">
	  </div>
	  <div class="form-group">
		<label>Formatted Name</label>
		<input v-model="formattedName" type="text" class="form-control" placeholder="Enter formatted name">
	  </div>
	  <button type="submit" class="btn btn-primary">Save Changes</button>
	</form>
</template>

<script>
	export default {
		props: {
			tabData: Object
		},
		data() {
			return {
				title: '',
				givenName: '',
				middleName: '',
				familyName: '',
				fullName: '',
				formattedName: ''
			}
		},
		watch: {
			tabData: {
				immediate: true,
				handler() {
					this.title = this.tabData.party.title;
					this.givenName = this.tabData.party.givenName;
					this.middleName = this.tabData.party.middleName;
					this.familyName = this.tabData.party.familyName;
					this.fullName = this.tabData.party.fullName;
					this.formattedName = this.tabData.party.formattedName;
				}
			}
		}
	}
</script>
