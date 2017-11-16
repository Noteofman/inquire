<template>	
	<nav class="navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Inquire</a>
			</div>
			
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<form class="navbar-form navbar-left ng-pristine ng-valid" role="search">
					<div class="form-group">
						<input type="text" class="form-control">
					</div> <button type="submit" class="btn btn-default">Search</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#">Link</a>
					</li>
					<li class="dropdown">
						 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
						<ul class="dropdown-menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
		</div>
	</nav>
</template>

<script>
export default {
  name: 'app-nav'
}

</script>
