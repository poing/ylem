<template>
	<div class="content base-manager">
		<div :class="`row ${tabShown ? 'd-none' : ''}`">
			<div class="col-md-12">
				<Breadcrumbs v-on:openCrumb="openChild" :crumbs="childs"></Breadcrumbs>
			</div>
		</div>
		<div id="child-views-holder" ref="childView" :class="`row child-views-holder ${tabShown ? 'd-none' : ''}`">
			<child-manager-view v-on:viewDetails="viewDetails" v-on:rootFetched="rootFetched" v-on:openChild="openChild" has-root></child-manager-view>
			<child-manager-view v-on:viewDetails="viewDetails" v-on:childMounted="childMounted" :parent="child" v-for="child in childs" :key="child.id" v-on:openChild="openChild"></child-manager-view>
		</div>
		<div v-if="tabShown" class="row tab-holder-row">
			<div class="col-md-12 tab-holder">
				<Tabs :tabInfo="tabData"></Tabs>
			</div>
		</div>
	</div>
</template>

<script>
	import childManagerView from './ChildManagerView.vue';
	import Breadcrumbs from './Breadcrumbs.vue';
	import Tabs from './Tabs.vue';

	export default {
		data() {
			return {
				childs: [],
				rootId: null,
				roots: [],
				childRoots: [],
				tabShown: false,
				tabData: null
			}
		},
		components: {
			Breadcrumbs,
			childManagerView,
			Tabs
		},
		methods: {
			openChild(element) {
				if (element.children.length) {

					// Remove all childs if the root is not null and the roots has a different element	
					if (this.rootId !== null && this.roots.includes(element.id) && this.rootId !== element.id) {
						this.childs = [];
						this.childRoots = [];
					}

					// Remove N number of childs after a child if the parents change
					for (let i = 0; i < this.childRoots.length; i++) {
						// Check if element exists as a child root
						if (this.childRoots[i].includes(element.id)) {
							const rootArray = this.childRoots[i];
							this.childRoots.splice(i + 1, this.childRoots.length - 1); // Clear array from ith position
							for (let j = 0; j < rootArray.length; j++) {
								if (this.childs.map(child => child.id).includes(rootArray[j])) {
									const childId = rootArray[j];
									const indexOfChild = this.childs.map(child => child.id).indexOf(childId);
									this.childs.splice(indexOfChild, this.childs.length - 1);
									break;
								}
							}
							break;
						}
					}

					this.rootId = element.id;
					if (!this.childs.map(child => child.id).includes(element.id)) {
						this.childRoots.push(element.children.map(child => child.id));
						this.childs.push(element);
					}
				}
			},
			rootFetched(roots) {
				this.roots = roots.map(root => root.id);
			},
			childMounted(elementName) {
				// Scroll to the right or up depending on the users position
				this.$scrollTo('#' + elementName, 1000, { container: '#child-views-holder', x: true, y: true });
			},
			viewDetails(el) {
				this.tabShown = true; // Show the tabs
				this.tabData = el;
			}
		}
	}
</script>
