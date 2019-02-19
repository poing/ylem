<template>
	<div class="col-md-3" style="padding-left: 16px; padding-top: 5px;" :id="uniqClass">
		<Card v-if="hasRoot" v-on:viewDetails="viewDetails" v-on:openChild="openChild" v-for="element in elements" :key="element.id" :card-info="element"></Card>
		<Card v-if="!hasRoot" v-on:viewDetails="viewDetails" v-on:openChild="openChild" v-for="element in elements" :key="element.id" :card-info="element"></Card>
	</div>
</template>

<script>
	import Card from './Card.vue';

	export default { 
		props: {
			hasRoot: Boolean,
			parent: Object,
		},
		data() { 
			return {
				elements: [],
				uniqClass: `child${Math.floor(Math.random() * 99999999)}`
			}
		},
		components: {
			Card
		},
		mounted() {
			if (this.hasRoot) {
				this.fetchRoot();
			} else {
				this.fetchChildren();
			}
			this.$emit('childMounted', this.uniqClass);
		},
		methods: {
			fetchRoot() {
				const self = this;
				axios.get('/api/admin/manager/root')
				.then(res => {
					self.elements = res.data;
					this.$emit('rootFetched', res.data);
				}).catch(e => {
					console.log(e);
				});
			},
			fetchChildren() {
				const self = this;
				axios.get('/api/admin/manager/children/' + this.parent.id)
				.then(res => {
					self.elements = res.data;
				}).catch(e => {
					console.log(e);
				});
			},
			openChild(el) {
				this.$emit('openChild', el);
			},
			viewDetails(el) {
				this.$emit('viewDetails', el);
			}
		}
	}
</script>
