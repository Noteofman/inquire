<template>
<nav class="navbar-default navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span><span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<router-link to="/"> <img id='nav-logo' src="/img/logo-single.png" class="pull-left drop-shadow"></router-link>
			<router-link to="/" class="navbar-brand" >Home</router-link>
			<router-link to="/browse" class="navbar-brand" >Browse</router-link>
		</div>
		
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<form v-on:submit.prevent="onSearch" id='search-container' class="navbar-form navbar-left ng-pristine ng-valid" role="search">
				<div class="form-group">
					<input v-model='searchTerm' id='search-text' placeholder='Business name' type="text" class="form-control">
				</div> <button type="submit" class="btn btn-default">Search</button>
			</form>
		</div>
		
	</div>
</nav>
</template>

<script>

import router from '../../routes';

export default {
	name: 'app-nav',

	data() {
		return {
			searchTerm: null
		}
	},

	methods: {
		onSearch() {
			if (!this.searchTerm) {
				return;
			}
			router.replace({name: 'search', query:{ term: this.searchTerm}});
		}
	}
}

</script>

<style type="text/css">

@media screen and (min-width: 1000px) {
	#search-container {
		width:700px;
	}

	#search-text {
		width:500px;
	}
}
#nav-logo {
	width:60px;
	padding:5px;
}

</style>