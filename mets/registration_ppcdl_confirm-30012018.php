<?php 
include("includes/config.php");
	include("includes/function.php");
	$str15 = mysqli_query($con, "select * from booking_details where booking_id= '".$_GET['booking_id']."'");
			$bookingDetails = mysqli_fetch_array($str15);
			if($bookingDetails['registering_as'] == "Group of 3 or more"){
				$str15 = mysqli_query($con, "select * from group_members where booking_id= '".$_GET['booking_id']."'");
			$groupDetails = mysqli_fetch_array($str15);
			}
?>
<!DOCTYPE html>
<html>
<head>
<title>METS Training Services | PPCDL Registration </title>
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
<link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,100italic,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
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
			  <li class="active">PPCDL Registration</li>
			</ol>
			<div class="about-grids">
				<div class="col-md-12 about-grid">
					<h3>PPCDL Registration</h3>
					<h4 class="h4_sub_title">Powered Pleasure Cruise Driving License</h4>
					 <div class="col-sm-offset-3 col-sm-9">
					<h5 class="h5_sub_title">Contact Information</h5>
					</div>
<form class="form-horizontal" action="payment/paypal.php?ref_booking_id=<?=$_GET['booking_id']?>" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3">Name:</label>
    <div class="col-sm-9">
      <?php echo $bookingDetails['booking_name'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Nationality:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['nationality'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">NRIC/Passport No:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['nric_passport_no'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Phone/Mobile No:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['phone'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Email:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['email'];?>
    </div>
  </div>
 <!-- <div class="form-group">
    <label class="control-label col-sm-3">Address in Singapore:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['address'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">NOK's Name: (next-of-kin):</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['noks_name'];?>
    </div>
  </div> -->
  <div class="form-group">
    <label class="control-label col-sm-3">NOK's Phone No:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['noks_phone'];?>
    </div>
  </div>

  <div class="col-sm-8">
   <div class="col-sm-offset-4 col-sm-8">
 <h5 class="h5_sub_title">PPCDL Course Details</h5>
 </div>
  <div class="form-group">
    <label class="control-label col-sm-4">PPCDL Course to Attend:</label>
    <div class="col-sm-8">
       <?php echo $bookingDetails['course_name'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4">Preferred Date:</label>
    <div class="col-sm-8">
       <?php echo $bookingDetails['preferred_date'];?>
    </div>
  </div>


 
  <div class="form-group">
    <label class="control-label col-sm-4">Registering as:</label>
  <div class="col-sm-8">
       <?php echo $bookingDetails['registering_as'];?>
    </div>
  </div>
    </div>
  <div style=" clear: both;"></div>

<div class="voucher <?php if($bookingDetails['registering_as']!="Groupon"){echo "none";} ?>">
 <div class="col-sm-offset-3 col-sm-9">
 <h5 class="h5_sub_title">Voucher details</h5>
 </div>
 
  <div class="form-group">
    <label class="control-label col-sm-3">Groupon :</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['voucher_code'];?>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Groupon Security Code:</label>
    <div class="col-sm-9">
       <?php echo $bookingDetails['groupon_security_code'];?>
    </div>
  </div>
  </div>
  <div class="group3 <?php if($bookingDetails['registering_as']!="Group of 3 or more"){echo "none";} ?>">
 <div class="col-sm-offset-3 col-sm-9">
					<h5 class="h5_sub_title">Group Details</h5>
</div>
 
  <div class="form-group">
    <label class="control-label col-sm-3">Number of people signing up:</label>
     <div class="col-sm-9">
       <?php echo count($groupDetails);?>
    </div>
	
  </div>
  <div class="memberDetails">

  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
	<input type="text" value="ppcdl" name="type">
	<input type="text" value="<?php echo $_GET['booking_id']; ?>" name="booking_id">
      <button type="submit" class="btn btn-default">Payment</button>
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
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="ppcdl.html">PPCDL Forms</a></li>
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
   $(".course").change(function() {
	var course = $(".course").val();
	 $(".mcc_registeringas").hide();
	 $(".registeringas").hide();
	  $(".navigation_registeringas").hide();
	   $(".voucher").hide();
	    $(".h5_training_schedule").html("");
	   $(".schedule_list").html("");
	   $('#preferred_date').val('');				
$('#course_training_id').val('');
	   if(course == "PPCDL under MCC"){
		   $(".mcc_registeringas").show();
		   $(".h5_training_schedule").html("MCC Schedule");
		   $.ajax({
				url: "ajax_schedule.php",
				type: 'POST',
				data: {course_id:2},
				success: function (data) {
				$(".schedule_list").html(data);
				}
			}); 
	   } else if(course == "Advance Navigation Course"){
		   $(".navigation_registeringas").show();
		   $(".h5_training_schedule").html("Advance Navigation course Schedule");
		   $.ajax({
				url: "ajax_schedule.php",
				type: 'POST',
				data: {course_id:3},
				success: function (data) {
				$(".schedule_list").html(data);
				}
			}); 
	   } 
if(course != ""){
	 $(".registeringas").show();
}
if($("input[type='radio'][name='registering_as']:checked").val() == 'Groupon')	{
	 $(".voucher").show();
}   
});

//alert($("input[type='radio'][name='registering_as']:checked"));
$("input[type='radio'][name='registering_as']").click(function () {
                      if($(this).val() == 'Groupon'){
						  $(".voucher").show();
					  } else{
						  $(".voucher").hide();
					  }
					  
					  if($(this).val() == 'Group of 3 or more'){
						  $(".group3").show();
					  } else{
						  $(".group3").hide();
					  }
                });

		
 $(".add_member").click(function() {
	 if($(".member_count").val() == "" || $(".member_count").val() == 0){
		 $( ".member_count" ).focus();
	 } else {
		 var md ="";
		 for(i=0;i<$(".member_count").val();i++){
			 j = i;
			 md += '   <div class="col-sm-offset-3 col-sm-9"><h5 class="h5_sub_title">Member '+(j+1)+'</h5></div><div class="form-group"><label class="control-label col-sm-3">Name:</label><div class="col-sm-9"><input type="text" class="form-control" name="memberName[]" placeholder="" required></div></div><div class="form-group"><label class="control-label col-sm-3">I/C:</label><div class="col-sm-9"><input type="text" class="form-control" name="memberIC[]" placeholder=""></div></div><div class="form-group"><label class="control-label col-sm-3">Email:</label><div class="col-sm-9"><input type="text" class="form-control" name="memberEmail[]" placeholder=""></div></div>';
		 }
		  $( ".memberDetails" ).html(md);
	 }
 });	
});
</script>
</body>
</html>