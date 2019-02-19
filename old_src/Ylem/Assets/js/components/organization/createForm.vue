<template>
	<form>
	  <h5 class="font-weight-bold">Create root organization</h5>
	  <hr>
	  <div class="form-group">
	    <label>{{ language.tradingName }}</label>
	    <input v-model="tradingName" :placeholder="language.tradingName_ph" type="text" class="form-control" name="tradingName">
	  </div>
	  <div class="form-group">
	    <label>{{ language.nameType }}</label>
	    <input v-model="nameType" :placeholder="language.nameType_ph" type="text" class="form-control" name="nameType">
	  </div>
	  <div class="form-group">
	    <label>{{ language.status }}</label>
	    <input v-model="status" :placeholder="language.status_ph" type="text" class="form-control" name="status">
	  </div>
	  <div class="form-group">
	  	<label>{{ language.startDate }}</label>
		<input type="text" class="form-control" v-model="startDate" name="startDate">
	  </div>
	  <button type="submit" @click="createOrg" class="btn btn-primary">Create</button>
	</form>
</template>

<script>
	export default {
		props: {
			locale: String
		},
		data() {
			return {
				tradingName: '',
				nameType: '',
				status: '',
				startDate: '',
			}
		},
		mounted() {
			// Set default date
			this.startDate = this.today;
		},
		computed: {
			language() {
				return JSON.parse(this.locale);
			},
			today() {
				const date = new Date();
				return `${date.getFullYear()}/${('0' + (date.getMonth()+1)).slice(-2)}/${('0' + date.getDate()).slice(-2)}`;
			}
		},
		methods: {
			createOrg(e) {
				e.preventDefault();
				const formData = this.createFormData(); // Get formdata
				// Create organization using api endpoint
				axios.post('/api/partyManagement/organization', formData).then(res => {
					console.log(res.data);
				}).catch(e => {
					console.log(e);
				});
			},
			createFormData() {
				let formData = new FormData();
				formData.append('tradingName', this.tradingName);
				formData.append('nameType', this.nameType);
				formData.append('status', this.status);
				formData.append('startDate', this.startDate);
				return formData;
			}
		}
	}
</script>