<?php 
session_start();
if (!empty($_POST))
{
	include("includes/config.php");
	include("includes/function.php");
	add_booking($_POST,$con);
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
  $( function() {
    $( ".cruise_date" ).datepicker({
		dateFormat: 'dd-mm-yy',
	//	showWeek: true,
		beforeShowDay: function(date) {
			 var day = date.getDay();
			 var date1 = date.getDate();
			 var week = date1/7; 
			/*   if(day ==0){
				 return '';
			 }
			 else{
				 return false;
			 }  */
    return [day == 0,''];
}
});
  } );
  </script>
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
				<li><a href="mailto:mets.enquiry@mets1.sg">mets.enquiry@mets1.sg</a></li>|
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
<form class="form-horizontal" action="registration_ppcdl.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3">Name:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="booking_name" placeholder="Full Name as per your IC & Passport" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Nationality:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nationality" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">NRIC/Passport No:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="nric_passport_no" placeholder="" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Phone/Mobile No:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="phone" placeholder="country code + phone number" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Email:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="email" class="form-control" name="email" placeholder="" required>
    </div>
  </div>
<!--  <div class="form-group">
    <label class="control-label col-sm-3">Address in Singapore:<span class="red">*</span></label>
    <div class="col-sm-9">
	  <textarea class="form-control" name="address" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">NOK's Name: (next-of-kin):<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="noks_name" placeholder="" required>
    </div>
  </div>  
  <div class="form-group">
    <label class="control-label col-sm-3">NOK's Phone No:<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="noks_phone" placeholder="" required>
    </div>
  </div> -->
 <div>
  <div class="col-sm-8">
   <div class="col-sm-offset-4 col-sm-8">
 <h5 class="h5_sub_title">PPCDL Course Details</h5>
 </div>
  <div class="form-group">
    <label class="control-label col-sm-4">To Attend:<span class="red">*</span></label>
    <div class="col-sm-8">
	  <select name="course" class="form-control course"  required>
	<!--  <option value="">Select</option>  -->
	  <option value="PPCDL under MCC">PPCDL under MCC</option>
	  <option value="Cruise">Cruise</option>
	  <option value="Other courses">Other courses</option>
	  <option value="Advance Navigation Course">Advance Navigation Course</option>
	  </select>
    </div>
  </div>
  <div class="form-group preferred_date">
    <label class="control-label col-sm-4">Preferred Date:<span class="red">*</span></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="preferred_date" name="preferred_date" placeholder="">
      <input type="hidden" class="form-control" id="course_training_id" name="course_training_id" placeholder="">
    </div>
  </div>
  
     
   <div class="cruise_form none">
	<div class="form-group">
		<label class="control-label col-sm-4">Name:<span class="red">*</span></label>
		<div class="col-sm-8">
		  <input type="text" class="form-control cruise_name" name="cruise_name" placeholder="">
		</div>
	 </div>
	 <div class="form-group">
		<label class="control-label col-sm-4">Age:<span class="red">*</span></label>
		<div class="col-sm-8">
		  <input type="number" class="form-control cruise_age" name="cruise_age" placeholder="">
		</div>
	 </div>
	 <div class="form-group">
		<label class="control-label col-sm-4">Number of pax:<span class="red">*</span></label>
		<div class="col-sm-8">
		  <input type="number" min="1" max="5" class="form-control cruise_nop" name="cruise_nop" placeholder="">
		</div>
	 </div>
	 <div class="form-group">
		<label class="control-label col-sm-4">Date:<span class="red">*</span></label>
		<div class="col-sm-8">
		  <input type="text" class="form-control cruise_date" name="cruise_date" placeholder="">
		</div>
	 </div>
	  <div class="form-group">
		<label class="control-label col-sm-4">Timing:<span class="red">*</span></label>
		<div class="col-sm-8">
		   <select name="cruise_timing" class="form-control cruise_timing">
	  <option value="Select">Select</option>
	  <option value="9am - 11am">9am - 11am</option>
	  <option value="11.30am - 1.30pm">11.30am - 1.30pm</option>
	  </select>
		</div>
	 </div>
   </div>
   
  </div>
   <div class="col-sm-4 training_schedules">
    <div class="col-sm-offset-1 col-sm-11">
 <h4 class="h4_training">Training Schedules</h4>
 <h5 class="h5_training">Please click your preferred schedule</h5>
 <h5 class="h5_training_schedule"></h5>
 <div class="schedule_list"></div>
 </div>

   </div>
   </div>
   <div style=" clear: both;"></div>
  <div class="form-group registeringas none">
    <label class="control-label col-sm-4">Are you registering as:<span class="red">*</span> <br/>
(for determining fees)</label>
 
  </div>
    <div class="form-group">
 <div class="col-sm-offset-3 col-sm-9 mcc_registeringas none">
 <table class="col-sm-9">
 <tr>
 <td><input type="radio" value="Full-time Student/NSF" name="registering_as" data-price="320"></td>
 <td> Full-time Student/NSF </td>
 <td> $320</td> 
 </tr>
 <tr>
 <td><input type="radio" value="Group of 3 or more" name="registering_as" data-price="360"></td>
 <td> Group of 3 or more </td>
 <td> $360</td> 

 </tr>
  <tr>
 <td><input type="radio" value="Working Adult" name="registering_as" data-price="400"></td>
 <td> Working Adult </td>
 <td> $400</td>
 
 </tr>
   <tr>
 <td><input type="radio" value="FAVE" name="registering_as" id="registering_as" data-price="168"></td>
 <td> FAVE </td>
 <td></td>
 </tr>
 </table>
</div>
</div>
 <div class="col-sm-offset-3 col-sm-9 navigation_registeringas none">
 <table class="col-sm-9">
  <tr>
 <td><input type="radio" value="Working Adult" name="registering_as" data-price="450"></td>
 <td> Working Adult </td>
 <td> $450</td>
  
 </tr>
 </table>

  <table class="col-sm-9">
  <tr>
  <td colspan="3">Groupon</td>
 
  </tr>
  <tr>
 <td><input type="radio" value="Groupon(Week Days)" name="registering_as" data-price="450"></td>
 <td> Week Days </td>
 <td> </td>
 </tr>
 <tr>
 <td><input type="radio" value="Groupon(Week Ends)" name="registering_as" data-price="450"></td>
 <td> Week Ends </td>
 <td> </td>
 </tr>
 </table>
 
   <table class="col-sm-9">
  <tr>
  <td colspan="3">METS promotions</td>
 
  </tr>
  <tr>
 <td><input type="radio" value="METS promotions(Week Days)" name="registering_as" data-price="450"></td>
 <td> Week Days </td>
 <td> </td>
 </tr>
 <tr>
  <td><input type="radio" value="METS promotions(Week Ends)" name="registering_as" data-price="188"></td>
 <td> Week Ends </td>
 <td> </td>
 </tr>
 </table>
</div>
<div class="voucher none">
 <div class="col-sm-offset-3 col-sm-9">
 <h5 class="h5_sub_title">Voucher details</h5>
 </div>
 
  <div class="form-group">
    <label class="control-label col-sm-3">Groupon :<span class="red">*</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control vouchergroupon" name="groupon" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3">Groupon Security Code:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="groupon_security_code" placeholder="">
    </div>
  </div>
  </div>
  <div class="group3 none">
 <div class="col-sm-offset-3 col-sm-9">
					<h5 class="h5_sub_title">Group Details</h5>
</div>
 
  <div class="form-group">
    <label class="control-label col-sm-3">Number of people signing up:</label>
    <div class="col-sm-3">
      <input type="number" min="1" max="50" class="form-control member_count" name="groupon3_count" placeholder="" >
    </div>
	<div class="col-sm-4">
     <button type="button" class="btn btn-default add_member">Add Member</button>
    </div>
  </div>
  <div class="memberDetails">

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
	<input type="hidden" value="" name="amount" id="amount">
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
					<p><a href="mailto:mets.enquiry@mets1.sg">mets.enquiry@mets1.sg</a></p>
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
			<p>Copyright © 2018 Mets Training Services. All rights reserved | Powered By:VBIS | Design by W3layouts</p>						
		</div>
	</div>
	</div>
<!--//footer-->	
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"> </script>
<!-- //for bootstrap working -->
<script type="text/javascript">
$( document ).ready(function() {
	$(".course").val("PPCDL under MCC");
	$(".mcc_registeringas").show();
	 $(".registeringas").show();
		   $(".h5_training_schedule").html("MCC Schedule");
		   $.ajax({
				url: "ajax_schedule.php",
				type: 'POST',
				data: {course_id:2},
				success: function (data) {
				$(".schedule_list").html(data);
				}
			}); 
	
   $(".course").change(function() {
	var course = $(".course").val();
	 $(".mcc_registeringas").hide();
	 $(".registeringas").hide();
	  $(".navigation_registeringas").hide();
	   $(".voucher").hide();
	    $(".h5_training_schedule").html("");
	   $(".schedule_list").html("");
	   $('#preferred_date').val('');				
	   $('.preferred_date').hide();	
 $(".preferred_date").prop('required',false);			
	   $('.training_schedules').hide();	
		    $(".cruise_form").hide();	
 $(".cruise_name").prop('required',false);
			 $(".cruise_age").prop('required',false);
			 $(".cruise_nop").prop('required',false);
			 $(".cruise_date").prop('required',false);
			 $(".cruise_timing").prop('required',false);			
$('#course_training_id').val('');
	   if(course == "PPCDL under MCC"){
		   $(".mcc_registeringas").show();
		    $(".registeringas").show();				
	   $('.preferred_date').show();	
 $(".preferred_date").prop('required',true);
	   $('.training_schedules').show();	
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
		    $(".registeringas").show();			
	   $('.preferred_date').show();		
 $(".preferred_date").prop('required',true);	
	   $('.training_schedules').show();	
		   $(".h5_training_schedule").html("Advance Navigation course Schedule");
		   $.ajax({
				url: "ajax_schedule.php",
				type: 'POST',
				data: {course_id:3},
				success: function (data) {
				$(".schedule_list").html(data);
				}
			}); 
	   } else if (course == "Cruise"){
		    $(".cruise_form").show();
			 $(".cruise_name").prop('required',true);
			 $(".cruise_age").prop('required',true);
			 $(".cruise_nop").prop('required',true);
			 $(".cruise_date").prop('required',true);
			 $(".cruise_timing").prop('required',true);
	   }

if($("input[type='radio'][name='registering_as']:checked").val() == 'Groupon')	{
	 $(".voucher").show();
	  $(".vouchergroupon").prop('required',true);
}   
});

//alert($("input[type='radio'][name='registering_as']:checked"));
$("input[type='radio'][name='registering_as']").click(function () {
	// alert($(this).data("price"));
	if (typeof $(this).data('price') !== 'undefined')
{
	$("#amount").val($(this).data("price"));
} else {
	$("#amount").val("");
}
                      if($(this).val() == 'Groupon'){
						  $(".voucher").show();
						   $(".vouchergroupon").prop('required',true);
					  } else{
						  $(".voucher").hide();
						   $(".vouchergroupon").prop('required',false);
					  }
					  
					  if($(this).val() == 'Group of 3 or more'){
						  $(".group3").show();
						   $(".member_count").prop('required',true);
					  } else{
						  $(".group3").hide();
						   $(".member_count").prop('required',false);
					  }
                });

		
 $(".add_member").click(function() {
	 if($(".member_count").val() == "" || $(".member_count").val() == 0){
		 $( ".member_count" ).focus();
	 } else {
		 var md ="";
		 for(i=0;i<$(".member_count").val();i++){
			 j = i;
			 md += '   <div class="col-sm-offset-3 col-sm-9"><h5 class="h5_sub_title">Member '+(j+1)+'</h5></div><div class="form-group"><label class="control-label col-sm-3">Name:<span class="red">*</span></label><div class="col-sm-9"><input type="text" class="form-control" name="memberName[]" placeholder="" required></div></div><div class="form-group"><label class="control-label col-sm-3">I/C:</label><div class="col-sm-9"><input type="text" class="form-control" name="memberIC[]" placeholder=""></div></div><div class="form-group"><label class="control-label col-sm-3">Email:</label><div class="col-sm-9"><input type="text" class="form-control" name="memberEmail[]" placeholder=""></div></div>';
		 }
		  $( ".memberDetails" ).html(md);
	 }
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

</script>

<script language="javascript">	
	window.onload = refreshCaptcha;
</script>
</body>
</html>