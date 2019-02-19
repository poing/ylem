<template>
	<form>
	  <div class="form-group">
		<label>Unit Name</label>
		<input v-model="tradingName" type="text" class="form-control" placeholder="Enter unit name">
	  </div>
	  <div class="form-group">
		<label>Status</label>
		<input v-model="status" type="text" class="form-control" placeholder="Enter status">
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
				status: '',
			}
		},
		watch: {
			tabData: {
				immediate: true,
				handler() {
					this.tradingName = this.tabData.party.tradingName;
					this.status = this.tabData.party.status;
				}
			}
		}
	}
</script>
