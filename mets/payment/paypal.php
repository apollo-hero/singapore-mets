<?php
include("../includes/config.php");
include("../includes/function.php");
	
	

		
/*  PHP Paypal IPN Integration Class Demonstration File
 *  4.16.2005 - Micah Carrick, email@micahcarrick.com
 *
 *  This file demonstrates the usage of paypal.class.php, a class designed  
 *  to aid in the interfacing between your website, paypal, and the instant
 *  payment notification (IPN) interface.  This single file serves as 4 
 *  virtual pages depending on the "action" varialble passed in the URL. It's
 *  the processing page which processes form data being submitted to paypal, it
 *  is the page paypal returns a user to upon success, it's the page paypal
 *  returns a user to upon canceling an order, and finally, it's the page that
 *  handles the IPN request from Paypal.
 *
 *  I tried to comment this file, aswell as the acutall class file, as well as
 *  I possibly could.  Please email me with questions, comments, and suggestions.
 *  See the header of paypal.class.php for additional resources and information.
*/

// Setup class
require_once('paypal.class.php');  // include the class file


$p = new paypal_class;             // initiate an instance of the class
//$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url   
// setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
//$this_script = 'http://'.$_SERVER['HTTP_HOST'].'/sbxfc/register_form.php';

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':      // Process and order...

      // There should be no output at this point.  To process the POST data,
      // the submit_paypal_post() function will output all the HTML tags which
      // contains a FORM which is submited instantaneously using the BODY onload
      // attribute.  In other words, don't echo or printf anything when you're
      // going to be calling the submit_paypal_post() function.
 
      // This is where you would have your form validation  and all that jazz.
      // You would take your POST vars and load them into the class like below,
      // only using the POST values instead of constant string expressions.
 
      // For example, after ensureing all the POST variables from your custom
      // order form are valid, you might have:
      //
      // $p->add_field('first_name', $_POST['first_name']);
      // $p->add_field('last_name', $_POST['last_name']);
	  /*
		 $qry445		=	"select * from  order_details  where order_id='".$order_id."' ";
		$exeqry445	=	mysql_query($qry445);
		$res445		= 	mysql_fetch_array($exeqry445);
		$seller_id 	=	stripslashes($res445['seller_id']);
		
		$tot 	=	($res445['product_price']*$res445['product_qty'])+$res445['shipping_charge'];*/
	//	echo $booking_id;
		 $type = $_POST["type"];
		 $booking_id = $_POST['booking_id'];
		
		if($type == "ppcdl")
		{
			$qrys = "select * from booking_details where booking_id= '".$booking_id."'";
			$qtres = mysqli_query($con, $qrys);
			$res445 = mysqli_fetch_array($qtres);
			
			  $p->add_field('return', $site_url.'payment/paypal.php'.'?action=success&order_id='.$booking_id);
			  $p->add_field('cancel_return', $site_url.'payment/paypal.php'.'?action=cancel&order_id='.$booking_id);
			  $p->add_field('notify_url', $site_url.'payment/paypal.php'.'?action=ipn&order_id='.$booking_id);
		
			   $p->add_field('item_name', $res445['booking_name']. ','.$res445['email']. '-('.$res445['course_name']. ' '.$res445['preferred_date'].")");
			   $p->add_field('amount', $res445['payable_amount']);
	 	}
		else if($type == "ref")
		{
			$qrys = "select * from refresher_training_schedules where booking_id= '".$booking_id."'";
			$qtres = mysqli_query($con, $qrys);
			$res445 = mysqli_fetch_array($qtres);
			
			  $p->add_field('return', $site_url.'payment/paypal.php'.'?action=success&course=ref&order_id='.$booking_id);
			  $p->add_field('cancel_return', $site_url.'payment/paypal.php'.'?action=cancel&course=ref&order_id='.$booking_id);
			  $p->add_field('notify_url', $site_url.'payment/paypal.php'.'?action=ipn&course=ref&order_id='.$booking_id);
		
			   $p->add_field('item_name', $res445['name']. ','.$res445['email']. '-('.$res445['course_to_attend'].")");
			   // if($res445['course_to_attend']=='MCC/RSYC')
				 //$amount = '120';
				// else 
				//$amount = '150';
				
			   $p->add_field('amount', $res445['amount']);
			
	 	}
	   $p->add_field('business', 'hilbert@mets1.sg');
	   //$p->add_field('quantity', 1);
      // $p->add_field('shipping', $res445['shiping_charge']);
      //$p->add_field('tax', stripslashes($res445['tax']));
      $p->add_field('currency_code','SGD');
	   
      $p->submit_paypal_post(); // submit the fields to paypal
      break;
      
   case 'success':      // Order was successful...
   
      // This is where you would probably want to thank the user for their order
      // or what have you.  The order information at this point is in POST 
      // variables.  However, you don't want to "process" the order until you
      // get validation from the IPN.  That's where you would have the code to
      // email an admin, update the database with payment status, activate a
      // membership, etc.  
	  
 		//echo "<html><head><title>Success</title></head><body><h3>Thank you for your order.</h3>";
	 	//echo "<br>";
	   // echo $id;
	  //print_r($_POST['payer_id']);
	 // echo "<br>-----------------";
    	//foreach ($_POST as $key => $value) { echo "$key: $value<br>"; }
     	//echo "</body></html>";
		
			$subject = 'Recieved Payment Order No.--'.$_GET['order_id'].'-course-'.$_GET['course'];
			$to = '@d.com';    //  your email
			$body =  "An instant payment notification was successfully recieved\n";
			$body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
			$body .= " at ".date('g:i A')."\n\nDetails:\n";
			foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
			//mail($to, $subject, $body);
		
		if($_GET['course']=='ref')
		{
			$qrys = "select * from refresher_training_schedules where booking_id= '".$_GET['order_id']."'";
			$qtres = mysqli_query($con, $qrys);
			$res445 = mysqli_fetch_array($qtres);
			$name = $res445['name'];
			$email = $res445['email'];
			$qr	= 	"UPDATE  refresher_training_schedules SET 
			booking_status	=	'Y' where booking_id='".$_GET['order_id']."' ";
			mysqli_query($con, $qr);
			header("Location:../register_return_ref.php");
			
		}
		else
		{
			
				$str15 = mysqli_query($con, "select * from booking_details where booking_id= '".$_GET['order_id']."'");
				$result_batch = mysqli_fetch_array($str15);
				if($result_batch['booking_status']=='N')
				{
					if($result_batch['registering_as']=='Group of 3 or more')
					{
						$str1544 = mysqli_query($con, "select count(*) as cnt from group_members where booking_id= '".$result_batch['booking_id']."'");
						$result_member = mysqli_fetch_array($str1544);
						$num_member = $result_member['cnt'];
					}
					else
						$num_member = 1;
					$qr	= 	"UPDATE  training_schedules SET 
					no_of_sign_up	=	no_of_sign_up+".$num_member." where course_training_id='".$result_batch['course_training_id']."' and limit_stat='Y'";
					mysqli_query($con, $qr);
					
					$str152 = mysqli_query($con, "select * from training_schedules where course_training_id= '".$result_batch['course_training_id']."'");
					$result_batch2 = mysqli_fetch_array($str152);
					
					if(($result_batch2['no_of_sign_up'])>=$result_batch2['max_limit'] &&  $result_batch2['limit_stat'] =='Y')
					{
						$qr	= 	"UPDATE  training_schedules SET 
						training_stat	=	'C' where course_training_id='".$result_batch['course_training_id']."' ";
						mysqli_query($con, $qr);
					}
					$qr	= 	"UPDATE  booking_details SET 
					booking_status	=	'Y' where booking_id='".$_GET['order_id']."' ";
					mysqli_query($con, $qr);
				}
			
			
			
			if($result_batch['course_id']==3)
				header("Location:../register_return_adv.php");
			else
				header("Location:../register_return_ppcdl.php");	
		}
		
				// $subject = 'Payment Notification from mets1.sg Booking No.--'.$_GET['order_id'];
			 	//$to = $email;   //  your email
				// $body =  "An instant payment notification from mets1.sg\n";
				 //$body .= "from enquiry@mets1.sg on ".date('m/d/Y');
				// $body .= "\n\n\n\nThanks\n\nmets1.sg\n";
			
			 	//foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
				//mail($to, $subject, $body);
				
      	
		//$qrrr2 = "UPDATE order_details set payment_stat='C' WHERE  order_id = '".$_GET['order_id']."'";
		//mysql_query($qrrr2) or die(mysql_error());
		
 		
    
      // You could also simply re-direct them to another page, or your own 
      // order status page which presents the user with the status of their
      // order based on a database (which can be modified with the IPN code 
      // below).
      
      break;
      
   case 'cancel':       // Order was canceled...
      // The order was canceled before being completed.
 
      //echo "<html><head><title>Canceled</title></head><body><h3>The order was canceled.</h3>";
      //echo "</body></html>";
	  /*
	  		$subject = 'Payment Notification - Recieved Payment Order No.--'.$_GET['id'];
			 $to = 'dd@sdf.com.';    //  your email
			/// $to = 's';    //  your email
			
			 $body =  "An instant payment notification was successfully recieved\n";
			 $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
			 $body .= " at ".date('g:i A')."\n\nDetails:\n";
			 
			 foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
			mail($to, $subject, $body);
		*/	
		
		
		
		
		
		
		
			 
			 	//foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
				//mail($to, $subject, $body);
		
		 
 		header("Location:../register_cancel.php");
      break;
      
   case 'ipn': // Paypal is calling page for IPN validation...
   
      // It's important to remember that paypal calling this script.  There
      // is no output here.  This is where you validate the IPN data and if it's
      // valid, update your database to signify that the user has payed.  If
      // you try and use an echo or printf function here it's not going to do you
      // a bit of good.  This is on the "backend".  That is why, by default, the
      // class logs all IPN data to a text file.
      
      if ($p->validate_ipn()) {
          
         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.
  
         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.
  
         // For this example, we'll just email ourselves ALL the data.
		/* if ($p->ipn_data['payment_status'] == 'Completed')
		{
			 //file_put_contents('paypal.txt', 'SUCCESS\n\n' . $p->ipn_data);
				$fp = fopen('paypal.txt', 'w');
				fwrite($fp, 'SUCCESS');
				fclose($fp);

		}
		else
		{
			 //file_put_contents('paypal.txt', "FAILURE\n\n" . $p->ipn_data);
				 $fp = fopen('paypal.txt', 'w');
				fwrite($fp, 'FAILURE');
				fclose($fp);
		}*/

		if($p->ipn_data['payment_status']=='Completed')
		{
			 /*$subject = 'Payment Notification - Recieved Payment Order No.--'.$_GET['id'];
			 $to = 'sdfsdfom';    //  your email
			/// $to = 's';    //  your email
			
			 $body =  "An instant payment notification was successfully recieved\n";
			 $body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
			 $body .= " at ".date('g:i A')."\n\nDetails:\n";
			 
			 foreach ($p->ipn_data as $key => $value) { $body .= "\n$key: $value"; }
			mail($to, $subject, $body);
			*/ 
				if($_GET['course']=='ref')
				{
					$qrys = "select * from refresher_training_schedules where booking_id= '".$_GET['order_id']."'";
					$qtres = mysqli_query($con, $qrys);
					$res445 = mysqli_fetch_array($qtres);
					$name = $res445['name'];
					$email = $res445['email'];
					$qr	= 	"UPDATE  refresher_training_schedules SET 
					booking_status	=	'Y' where booking_id='".$_GET['order_id']."' ";
					mysqli_query($con, $qr);
					
				}
				else
				{
					$str15 = mysqli_query($con, "select * from booking_details where booking_id= '".$_GET['order_id']."'");
					$result_batch = mysqli_fetch_array($str15);
					if($result_batch['booking_status']=='N')
					{
						if($result_batch['registering_as']=='Group of 3 or more')
						{
							$str1544 = mysqli_query($con, "select count(*) as cnt from group_members where booking_id= '".$result_batch['booking_id']."'");
							$result_member = mysqli_fetch_array($str1544);
							$num_member = $result_member['cnt'];
						}
						else
							$num_member = 1;
						$qr	= 	"UPDATE  training_schedules SET 
						no_of_sign_up	=	no_of_sign_up+".$num_member." where course_training_id='".$result_batch['course_training_id']."' and limit_stat='Y'";
						mysqli_query($con, $qr);
						
						$str152 = mysqli_query($con, "select * from training_schedules where course_training_id= '".$result_batch['course_training_id']."'");
						$result_batch2 = mysqli_fetch_array($str152);
						
						if(($result_batch2['no_of_sign_up'])>=$result_batch2['max_limit'] &&  $result_batch2['limit_stat'] =='Y')
						{
							$qr	= 	"UPDATE  training_schedules SET 
							training_stat	=	'C' where course_training_id='".$result_batch['course_training_id']."' ";
							mysqli_query($con, $qr);
						}
						$qr	= 	"UPDATE  booking_details SET 
						booking_status	=	'Y' where booking_id='".$_GET['order_id']."' ";
						mysqli_query($con, $qr);
					}	
				}
			
			
			
				
			
			
				//$qrrr2 = "UPDATE order_details set payment_stat='C' WHERE  order_id = '".$_GET['order_id']."'";
				//mysql_query($qrrr2) or die(mysql_error());
			
    
        }  
		 
		}	
		
		    
      break;
 }     

?>