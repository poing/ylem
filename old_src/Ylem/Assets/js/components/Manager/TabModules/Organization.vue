<template>
	<form>
	  <div class="form-group">
		<label>Company Name</label>
		<input v-model="tradingName" type="text" class="form-control" placeholder="Enter company name">
	  </div>
	  <div class="form-group">
		<label>Business Structure</label>
		<input v-model="nameType" type="text" class="form-control" placeholder="Enter business structure">
	  </div>
	  <div class="form-group">
		<label>Status</label>
		<input v-model="status" type="text" class="form-control" placeholder="Enter status">
	  </div>
	  <div class="form-group">
		<label>Date Established</label>
		<input v-model="dateEstablished" type="text" class="form-control" placeholder="Enter date established">
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
				tradingName: '',
				nameType: '',
				status: '',
				dateEstablished: '',
			}
		},
		watch: {
			tabData: {
				immediate: true,
				handler() {
					this.tradingName = this.tabData.party.tradingName;
					this.nameType = this.tabData.party.nameType;
					this.status = this.tabData.party.status;
					this.dateEstablished = this.tabData.party.dateEstablished;
				}
			}
		}
	}
</script>
