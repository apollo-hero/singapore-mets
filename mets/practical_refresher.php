<?php 
session_start();
if (!empty($_POST))
{
	include("includes/config.php");
	include("includes/function.php");
	add_practical_refresher($_POST,$con);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>METS Training Services | Practical Refresher </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mets Singapore Marine services" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/my_style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="captcha.js"></script>
</head>
	
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
	<div class="about" style="padding-bottom: 0px;">
		<div class="container">
			<ol class="breadcrumb breadco">
			  <li><a href="index.html">Home</a></li>
			  <li class="active">Practical Refresher</li>
			</ol>
			<div class="about-grids">
				<div class="col-md-12 about-grid">
					<h3>Register for Practical Refresher</h3>
				<!--	<h4 class="h4_sub_title">Powered Pleasure Cruise Driving License</h4>  -->
					 <div class="col-sm-offset-3 col-sm-9">
					<h5 class="h5_sub_title"> </h5>
					</div> 
<form class="form-horizontal" action="practical_refresher.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3">Name:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="booking_name" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Phone:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="phone" placeholder="" value="65" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Email:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Click your preferred date and time:<span class="red">*</span></label>
    <div class="col-sm-9">
	  <input type="text" class="form-control datepicker" name="preferred_date" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Availabile Slot:<span class="red">*</span></label>
    <div class="col-sm-9">
	  <select name="refresher_training" class="form-control refresher_training"  required>
	  <option value="">Select</option>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Course to Attend:<span class="red">*</span></label>
    <div class="col-sm-9">
       <select name="course" class="form-control course"  required>
	  <option value="">Select</option>
	  <option value="MCC/RSYC">MCC ($80 / hour)</option>
	  <option value="Other Marinas">Other Marinas ($100 / hour)</option>
	  </select>
    </div>
  </div>
     <div class="form-group">
    <label class="control-label col-sm-3">Enter Captcha:</label>
	  <div class="col-sm-3">
   <input class="form-control" name="captcha" id="captcha" type="text" size="10" maxlength="6" required/>
   </div>
    <div class="col-sm-1">
<iframe src="php_captcha.php" id="iframe1" frameborder="0"  height="50px" width="110px" style="border: 0px;" scrolling="no" marginheight="5px" marginwidth="0px"></iframe>
  </div>
  <div class="col-sm-1" style="text-align:center;">
        <img src="images/refresh.png" onclick="Reload();refreshCaptcha();" style="margin-top:0px !important;" />
        <input id="cap_code" type="hidden" name="cap_code" value="<?=$_SESSION['captcha_val']?>" />
		</div>
		</div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
</form> 
				
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
	</div>
<!--//footer-->	
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<script type="text/javascript">
$( document ).ready(function() {
  $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );

 $(".datepicker").change(function() {
	  $.ajax({
				url: "ajax_slot.php",
				type: 'POST',
				data: {preferred_date:$(".datepicker").val()},
				success: function (data) {
				$(".refresher_training").html(data);
				}
			}); 
 });
});

 $( ".form-horizontal" ).submit(function( event ) {
  if(document.getElementById('cap_code').value != document.getElementById('captcha').value) {
	    event.preventDefault();
		alert("Captcha Code Mismatch");
		document.getElementById('captcha').focus();
		return false;
	}	
});

window.onload = refreshCaptcha; 
</script>
</body>
</html>