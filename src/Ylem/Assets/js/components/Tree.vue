<template>
	<div class="tree">
		<vjstree :data="treeData" show-checkbox multiple allow-batch whole-row></vjstree>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				treeData: []
			}
		},
		mounted() {
			const self = this;
			axios.get('/api/tree')
			.then(res => {
				self.treeData = res.data;
			}).catch(e => {
				console.log(e);
			});
		},
	}
</script>