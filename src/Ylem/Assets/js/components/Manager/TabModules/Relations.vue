<template>
	<div class="row">
		<div class="col-md-4">
			<h5 class="text-center">Parent</h5>
		</div>
		<div class="col-md-4">
			<h5 class="text-center">Siblings</h5>
		</div>
		<div class="col-md-4">
			<h5 class="text-center">Children</h5>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			tabData: Object
		},
		mounted() {
			// Get the siblings and the parent
		}
	}
</script>
