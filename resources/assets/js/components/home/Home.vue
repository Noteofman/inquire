<template>
<div class="wrap">
	<section class="top-section">
	  <app-nav></app-nav>
      <div class="bgafter"></div>
		<div class="container">
			<div class="jumbotron">
				<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<h1>
							Hello, and welcome to Inquire :)
						</h1>
						<p>
							So what is this place? Well to put it simply, its a quick and easy tool to find
							business information.
						</p>
						<p>
							<a href="/#browse" class="btn btn-primary btn-lg">Browse Now</a>
						</p>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                      	<img src="/img/store.svg" id='store' class="drop-shadow">
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="second-section">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="glyphicon glyphicon-check"></span>
					</div>
					<h3 class="text-center">
						Built with Bootstrap 3
					</h3>
					<p>
						Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
					</p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="glyphicon glyphicon-check"></span>
					</div>
					<h3 class="text-center">
						Fully Responsive
					</h3>
					<p>
						Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
					</p>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="glyphicon glyphicon-check"></span>
					</div>
					<h3 class="text-center">
						Totally Free License
					</h3>
					<p>
						Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus.
					</p>
				</div>
			</div>
		</div>
	</section>
	<section class="features-section">
		<div class="container">
			
		</div>
	</section>
</div>
</template>

<script>

import Nav from '../../components/base/Nav';

export default {
  name: 'Home',
  components: {
  	'app-nav' : Nav
  }
}


</script>

<style scoped>

.drop-shadow {
    /* Use -webkit- only if supporting: Chrome < 54, iOS < 9.3, Android < 4.4.4 */
            filter: drop-shadow( -5px -5px 5px #000 );
}

body{
     padding-top:50px;   
}

#store{
	width:280px;
}

.top-section {
	height:550px;
  	background:  url('http://wallup.net/wp-content/uploads/2015/12/13687-drawing-artwork-landscape-architecture-town_square.jpg') top center fixed;
	background-size:100% auto;
	color: #fff;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	margin-bottom: 0px;
	position:relative;
}  
.top-section .bgafter{
    position:absolute;
    top:0px;
    left:0px;
    width:100%;
    height:100%;
    display:inline-block;
    background: rgba(44, 62, 80, .9);
    z-index:0;
}

.top-section .jumbotron {
    background:none;
    color:#fff;
    
   
}

.top-section .container{
    z-index:100;
    display:inline-block;
}

.second-section, .features-section, .price-section{
    padding:40px 0px;
}
.second-section{
  	background:#34495e;
    color:#fff;
  }
  .features-section{
      background:#2c3e50;
      color:#fff;
    }
.features-section small{
   	color:#fff; 
  }
  .price-section{
     	background:#3498db; 
    }
    
    .buy-section {
background: #2980b9;
background-size:100% auto;
color: #fff;
-webkit-border-radius: 0px;
-moz-border-radius: 0px;
border-radius: 0px;
margin-bottom: 0px;
position:relative;
padding:40px 0px;
}   
    

.mail{
    background-color: #07618B;
    width: 250px;height: 150px;
    margin-left: 40%;margin-top: 60px;
    position: relative;
    border-radius: 0px 0px 20px 20px;
  -webkit-box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.5);
-moz-box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.5);
box-shadow: 0px 5px 10px 0px rgba(0,0,0,0.5);
}
.mail span{
    display: inline-block;
    position: absolute;
}
.shadow{
    width: 129px;
    top: 111px;
    -webkit-transform: rotateZ(31deg);
    z-index: 5;
    left: 122px;
    box-shadow: 0px -1px 6px 1px rgba(52, 73, 94,0.5);
}
.mail:after{
    border-top: 75px solid transparent;
    border-left: 124px solid #2980b9;
    border-bottom: 75px solid #2980b9;
    border-right: 127px solid #2471A3;
    content: '';
    position: absolute;
    right: 0;
    border-radius: 0px 0px 20px 20px;
}
.mail:before {
border-top: 75px solid transparent;
border-left: 124px solid transparent;
border-bottom: 75px solid #07618B;
border-right: 127px solid transparent;
content: '';
position: absolute;
top: -150px;
left: 0;
}
.paper{
    position: absolute;
    width: 222px;
    height: 146px;
    background: #E0E0E0;
    left: 15px;
    top: -16px;
}
.mail .paper .head,.mail .paper .body{
    z-index: 9999;
}
.mail .paper .head{
    width: 67px;
    background: #C7C7C7;
    height: 9px;
    left: 16px;
}
.mail .paper .body{
    width: 192px;
    height: 9px;
    left: 16px;
    background: #B3B3B3;
    z-index: 0;
}
.mail .paper .span1{
    top: -40px;
}
.mail .paper .span2{
    top: -24px; 
}
.mail .paper .span3{
    top: 15px;
}
.mail .paper .span4{
    top: 35px;
}
.mail .paper .span5{
    top: 55px;
}
.mail .paper .span6{
    top: 75px;
}
.mail .number{
    top: -90px;
    right: 0;
    background: #FA565A;
    color: #FFF;
    padding: 4px 15px 4px 15px;
    font-size: 2em;
    border-radius: 50%;
    box-shadow: -3px 2px 0px 0px rgba(0,0,0,0.2);
    font-weight: bold;
}
.paper:before{
	left:0px;
    content: '';
    width: 222px;
    height: 58px;
    background: #FFF;
    position: absolute;
    top: -58px;
    color: #ccc;
    border-radius: 15px 15px 0px 0px;
}	

</style>