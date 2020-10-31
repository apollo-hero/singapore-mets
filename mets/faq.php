<?php 
	include("includes/config.php");
	include("includes/function.php");
	$faq = get_faq($con);
	

?>
<!DOCTYPE html>
<html>
<head>
<title>METS Training Services</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="METS Training Services" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
	<style>
	.cols_question {
    float: left;
    padding-left: 56px;
    background: url(images/icon_question.jpg) 18px top no-repeat;
    padding-bottom: 5px;
    color: #000000;
    font-weight: bold;
    font-size: 13px;
    padding-top: 5px;
}
	.cols_answer {
    float: left;
    padding-left: 56px;
    background: url(../images/faq_answer.jpg) 37px 2px no-repeat;
    padding-bottom: 15px;
}
	</style>
<body>
<!-- header -->
	<div class="header">
		<!--<div class="search">
			<form>
				<i class="glyphicon glyphicon-search" aria-hidden="true"></i><input type="text" value="Search Here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Here';}" required="">
			</form> 
		</div>-->
		<div class="logo">
			<a href="index.html">METS <span>Training Services</span></a>
		</div>
		<div class="logo-right">
			<ul>
				<li><a href="mailto:enquiry@mets1.sg">enquiry@mets1.sg</a></li>|
				<li>Contact Us</li>|
				<li>+65-6564 4866</li>
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<div class="header-nav">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li class="active"><a href="index.html">Home</a></li>
							<li><a href="about.html">Company Profile</a></li>
							<li><a href="training.html">Training Courses</a></li>
							<li><a href="services.html">Marine Services</a></li>
							<!--<li><a href="gallery.html">FAQ</a></li> -->
							<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</nav>
				</div><!-- /.navbar-collapse -->	
			</nav>
		</div>
	</div>
<!-- //header -->
<!-- banner -->
	<div class="banner1">
	</div>
<!-- //banner -->
<!-- about -->
	<div class="about">
		<div class="container">
			<ol class="breadcrumb breadco">
			  <li><a href="index.html">Home</a></li>
			  <li class="active">FAQ</li>
			</ol>
			<div class="about-grids">
				<div class="col-md-12 about-grid">
				<h3>FAQ</h3>
				</div>
				<div class="clearfix"> </div>
				
				<div class="col-md-12 about-grid">
					<div class="col-md-3 about-grid">
						<h4>Training Courses</h4>
						<ul>
							<li><a href="advanceship.html">Advance Ship Simulator courses </a></li>
							<li><a href="vts.html">VTS Training Courses </a></li>
							<li><a href="#">Assessing New Captains / Senior Chief Officers</a></li>
							<li><a href="port.html">Port Management Courses</a></li>
							<li><a href="shipboard.html">Shipboard Crisis Management Courses</a></li>
							<li><a href="training.html">Boating Courses</a></li>
							<li><a href="#">船驾驶执照（PPCDL）华文课程</a></li>
						</ul>
						
						
					</div>
		
				<div class="col-md-9 about-grid">
				<?php 
				foreach($faq as $fa){
				 ?>
				<div class="col-md-12 cols_question">
<?php echo $fa['question'];?>
</div>
			<div class="col-md-12 cols_answer">
<?php echo $fa['answer'];?>
	<br/></div>
				<?php } ?>
				</div>
						
				</div>
				
				
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //about -->
<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-row">
				<div class="col-md-3 footer-grids">
					<h4><a href="index.html">METS </a></h4>
					<p><a href="mailto:enquiry@mets1.sg">enquiry@mets1.sg</a></p>
					<p>+65-6564 4866</p>
					<ul class="social-icons">
						<li><a href="#" class="p"></a></li>
						<li><a href="#" class="in"></a></li>
						<li><a href="#" class="v"></a></li>
						<li><a href="#" class="facebook"></a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grids">
					<h3>Navigation</h3>					
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">Company Profile</a></li>
						<li><a href="training.html">Training Courses</a></li>
						<li><a href="services.html">Marine Services</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="ppcdl.php">PPCDL Forms</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-grids">
					<h3>Support</h3>
					<ul>
						<li><a href="gallery.html">Photo Gallery</a></li>
						
					</ul>
				</div>
				<div class="col-md-4 footer-grids">	
					<h3>Newsletter</h3>
					<p> <p>
					<form>					 
					    <input type="text" class="text" value="Enter Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
						<input type="submit" value="Go">					 
				 </form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">		
			<p>Copyright © 2017 Mets Training Services. All rights reserved | Powered By:VBIS | Design by W3layouts</p>						
		</div>
	</div>
<!--//footer-->	
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
</body>
</html>